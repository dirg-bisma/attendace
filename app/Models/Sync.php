<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/26/2017
 * Time: 12:08 PM
 */

namespace App\Models;


use Illuminate\Http\Request;

class Sync extends Sximo
{
    public function Tabsen(Request $request)
    {
        $tabsen = new Tabsen();

        $cek = $tabsen->where('id', $request->input('id'))->first();

        if(count($cek) == 1){
            $tabsen->where('id', $request->input('id'));
            $tabsen->id_pegawai = $request->input('id_pegawai');
            $tabsen->tgl = $request->input('tgl');
            $tabsen->id_finger = $request->input('id_finger');
            $tabsen->upload = "1";
            $tabsen->save();
            return "1";
        }else{
            $tabsen->id = $request->input('id');
            $tabsen->id_pegawai = $request->input('id_pegawai');
            $tabsen->tgl = $request->input('tgl');
            $tabsen->id_finger = $request->input('id_finger');
            $tabsen->upload = "1";
            $tabsen->save();
            return "1";
        }
    }

    public function Pegawai(Request $request)
    {
        $pegawai = new Pegawai();

        $cek = $pegawai->where('id_pegawai', $request->input('id_pegawai'))->first();

        if(count($cek) == 1){
            $pegawai->where('id_pegawai', $request->input('id_pegawai'));
            $pegawai->nama_pegawai = $request->input('nama_pegawai');
            $pegawai->save();
            return "1";
        }else{
            $pegawai->id_pegawai = $request->input('id_pegawai');
            $pegawai->nama_pegawai = $request->input('nama_pegawai');
            $pegawai->save();
            return "1";
        }
    }
}