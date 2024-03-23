@extends('layouts.app')

@section('content')

<div class="container mt-3">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Home User</h2>
        <p>Statistik Data Mahasiswa</p>
    </div>
    <div class="dashboard-content">
        <div class="row">
             <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Total Mahasiswa</h5>
                        <h1>{{ $jmlMahasiswa }}</h1>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Mahasiswa laki-laki</h5>
                         <h1>{{ $countLaki }}</h1>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">mahasiswa perempuan</h5>
                         <h1>{{ $countPerempuan }}</h1>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container col-xxl-8 px-4 py-5">
         <div class="col-md-10">
                <div class="card-header">
                    <h1 class="text-center">Mahasiswa</h1>
                </div>
                <div class="card-body">
                    <form action="">
                    <div class="row g-4 mb-3">
                        <div class="col-lg-3 col-md-2 col-sm-4">
                            <div class="search-box">
                                <input type="text" class="form-control search" id="search-task-options" placeholder="Cari Judul...." name="keyword" value="{{ $keyword }}">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                     
                        <div class="col-lg-2 col-sm-4">
                            <a href="{{ route('home')}}" class="btn btn-danger w-100"> <i class="ri-restart-line  me-1 align-bottom"></i>
                                Reset
                            </a>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4">
                            <button type="submit" class="btn btn-primary w-100"> <i class="ri-search-line me-1 align-bottom"></i>
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                     <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Usia</th>
                        </tr>
                        @foreach ($mahasiswas as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->alamat }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_lahir)->format('d/m/Y') }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->usia }}</td>
                        </tr>
                        @endforeach
                    </table> 
                    <div class="d-flex">
                       {{ $mahasiswas->links() }}
                    </div> 
                </div>
            </div>

        {{-- <h6>{{ $jmlMahasiswa }}</h6> --}}
    </div>
@endsection