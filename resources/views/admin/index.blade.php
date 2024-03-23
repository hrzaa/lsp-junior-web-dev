@extends('layouts.admin')
@section('content')
     <div class="container">
        <div class="row justify-content-center">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="col-md-10">
                <div class="card-header">
                    <h1 class="text-center">Mahasiswa</h1>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                         <a href="{{ route('mahasiswa.create') }}" class="btn btn-info mb-2 ">Add Mahasiswa</a>
                    </div>
                     <table class="table table-hover">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Tanggal Lahir</th>
                            <th>Gender</th>
                            <th>Usia</th>
                            <th>Aksi</th>
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
                            <td>
                                <div class="btn-group">
                                <a href="{{ route('mahasiswa.edit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('mahasiswa.destroy', $item->id ) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table> 
                    <div class="d-flex">
                       
                    </div> 
                </div>
            </div>
        </div>
    </div>
@endsection