<?php

namespace App\Http\Controllers;

use App\Perusahaan;
use App\Sektor;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perusahaan = Perusahaan::paginate(10);
        $sektor = Sektor::all();
        return view('perusahaan', compact('perusahaan', 'sektor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Perusahaan::insert([
            'id' => $id = IdGenerator::generate(['table' => 'perusahaan', 'length' => 6, 'prefix' =>'P-']),
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kontak_perusahaan' => $request->kontak_perusahaan,
            'id_sektor' => $request->id_sektor,
        ]);

        return redirect('/perusahaan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perusahaan = Perusahaan::where('id', $id)->firstOrFail();
        $sektor = Sektor::all();
        return view ('updateperusahaan', ['perusahaan'=> $perusahaan ], compact('sektor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::where('id', $id)->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat_perusahaan' => $request->alamat_perusahaan,
            'kontak_perusahaan' => $request->kontak_perusahaan,
            'id_sektor' => $request->id_sektor,
        ]);

        return redirect('/perusahaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Perusahaan  $perusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $perusahaan = Perusahaan::where('id', $id)->delete();

        return redirect('/perusahaan');
    }
}