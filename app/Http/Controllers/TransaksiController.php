<?php

namespace App\Http\Controllers;

use App\Transaksi;
use App\User;
use App\Karyawan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        date_default_timezone_set("Asia/Jakarta");
        if(isset($request->tanggal)){
          $tanggal = $request->tanggal;
        }else{
          $tanggal = date("Y-m-d");
        }

        $transaksi = Transaksi::with('user','karyawan')->where('tanggal', $tanggal)->get();

        return view('daftarpenyewa',compact('transaksi'), ['tanggal'=> $tanggal , 'karyawan_nama'=>$request->session()->get('nama')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $namakaryawan = $request->nama_karyawan;

        $karyawan = Karyawan::where('nama', $namakaryawan)->first();

        for($i = 0 ; $i < count($request->kode_studio) ; $i++){
          $userfdb = User::where([['nama', '=', $request->nama[$i]],
          ['telepon', '=', $request->kontak[$i]]])->first();

          if(!$userfdb){
            User::create(
             ['kode_user' => null, 'nama' => $request->nama[$i],
             'telepon' => $request->kontak[$i]]
            );

             $userfdb = User::where([['nama', '=', $request->nama[$i]],
             ['telepon', '=', $request->kontak[$i]]])->first();
          }

          Transaksi::create(
            ['kode_transaksi' => null, 'kode_karyawan'=> $karyawan->kode_karyawan, 'kode_user' => $userfdb->kode_user,
            'kode_studio'=> $request->kode_studio[$i],'kode_jadwal'=> $request->kode_jadwal[$i], 'diskon'=>$request->diskon[$i],
            'tanggal'=>$request->tanggal_jadwal[$i]]
          );
        }

        return redirect('/tambahsewa');

}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('edit',compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $updates = Transaksi::find($id);
        $updates->diskon = $request->diskon;
        $updates->kode_jadwal = $request->jadwal;
        $updates->tanggal = $request->tanggal;
        $updates->save();

        $updates = User::find($request->kode_user);
        $updates->nama = $request->nama;
        $updates->telepon = $request->kontak;
        $updates->save();

        // return redirect('/daftarpenyewa');
        return response()->json($updates);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        Transaksi::destroy($transaksi->kode_transaksi);
        return redirect('/daftarpenyewa');
    }
}
