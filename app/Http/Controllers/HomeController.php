<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::when($request->keyword, function ($query) use ($request) {
                $query->where('nama','like','%'.$request->keyword.'%');
            })
            ->orderByDesc('nim')
            ->paginate(10);

        return view('home', [
            'mahasiswas' => $mahasiswas,
            'keyword' => $request->keyword,
            'jmlMahasiswa' => Mahasiswa::count(),
            'countLaki' => Mahasiswa::where('gender', 'laki-laki')->count(),
            'countPerempuan' => Mahasiswa::where('gender', 'perempuan')->count(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
