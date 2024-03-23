<?php

namespace App\Http\Controllers\Admin;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MahasiswaRequest;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(10);
        return view('admin.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MahasiswaRequest $request)
    {
        $data = $request->all();

        // dd($data);

        Mahasiswa::create($data);

        return redirect()
            ->route('mahasiswa.index')
            ->with('status', 'Data mahasiswa berhasil ditambahkan');
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
    public function edit($id)
    {
        $item = [
            'mahasiswa' =>Mahasiswa::findOrfail($id),
        ];
        // dd($item);
        return view('admin.edit', $item);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MahasiswaRequest $request, $id)
    {
        $data = $request->all();
        $item = Mahasiswa::findOrfail($id);
        $item->update($data);

        return redirect()
            ->route('mahasiswa.index')
            ->with('status', 'Data Mahasiswa berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $item = Mahasiswa::findOrfail($id);
        $item->delete();

        return redirect()
            ->route('mahasiswa.index')
            ->with('status', 'Data mahasiswa berhasil dihapus');
    }
}
