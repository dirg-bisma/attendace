<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/14/2017
 * Time: 10:08 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Request;

class DetailLaporan extends Model
{
    function SimpanTunjangan(Request $request)
    {
        $t_d_t = new TdetailTunjangan();
        $t_d_t->where('id_t_lap_gaji', $request->input('id_laporan'))->delete();
        $data_var = array();
        foreach($request->all() as $key=>$value){
            if($key != "id_laporan" && $key != "id_pegawai"){
                $item_key = explode("_", $key);
                $key_val = str_replace(" ", "", $item_key[3]);
                $result_array = array_search($key_val, $data_var, true);
                if(count($data_var) == 0){
                    array_push($data_var, $key_val);
                }else{
                    if($result_array === false){
                        if(array_search($key_val, $data_var, true) === false){
                            array_push($data_var, $key_val);
                        }
                    }
                }
            }
        }
        $tunjangan = new Tunjanganmaster();
        $data_insert = array();
        for($i=0; $i< count($data_var); $i++){
            $t_detail_tunjangan = new TdetailTunjangan();
            $dt = $tunjangan->where('id_tunjangan', $data_var[$i])->first();
            $ktun = str_replace(" ", "", strtolower($dt->nama_tunjangan));
            $t_detail_tunjangan->id_t_lap_gaji = $request->input('id_laporan');
            $t_detail_tunjangan->id_pegawai = $request->input('id_pegawai');
            $t_detail_tunjangan->id_tunjangan = $data_var[$i];
            $t_detail_tunjangan->nilai = $request->input('t_nilai_'.$ktun."_".$data_var[$i]);
            $t_detail_tunjangan->faktor = $request->input('t_fak_'.$ktun."_".$data_var[$i]);
            $t_detail_tunjangan->hasil = $request->input('t_hasil_'.$ktun."_".$data_var[$i]);
            $t_detail_tunjangan->keterangan = $request->input('t_ket_'.$ktun."_".$data_var[$i]);
            $t_detail_tunjangan->save();
            array_push($data_insert, $data_var[$i]);
        }
        return $data_insert;
    }

    function SimpanPotongan(Request $request)
    {
        $t_d_p = new TdetailPotongan();
        $t_d_p->where('id_t_lap_gaji', $request->input('id_laporan'))->delete();
        $data_var = array();
        foreach($request->all() as $key=>$value){
            if($key != "id_laporan" && $key != "id_pegawai"){
                $item_key = explode("_", $key);
                $key_val = str_replace(" ", "", $item_key[3]);
                $result_array = array_search($key_val, $data_var, true);
                if(count($data_var) == 0){
                    array_push($data_var, $key_val);
                }else{
                    if($result_array === false){
                        if(array_search($key_val, $data_var, true) === false){
                            array_push($data_var, $key_val);
                        }
                    }
                }
            }
        }
        $potongan = new Potonganmaster();
        $data_insert = array();
        for($i=0; $i < count($data_var); $i++){
            $t_detail_potongan = new TdetailPotongan();
            $dp = $potongan->where('id_m_potongan', $data_var[$i])->first();
            $kpot = str_replace(" ", "", strtolower($dp->nama_potongan));
            $t_detail_potongan->id_t_lap_gaji = $request->input('id_laporan');
            $t_detail_potongan->id_pegawai = $request->input('id_pegawai');
            $t_detail_potongan->id_potongan = $data_var[$i];
            $t_detail_potongan->nilai = $request->input('p_nilai_'.$kpot."_".$data_var[$i]);
            $t_detail_potongan->faktor = $request->input('p_fak_'.$kpot."_".$data_var[$i]);
            $t_detail_potongan->hasil_rp = $request->input('p_hasil_'.$kpot."_".$data_var[$i]);
            $t_detail_potongan->keterangan = $request->input('p_ket_'.$kpot."_".$data_var[$i]);
            $t_detail_potongan->save();
            array_push($data_insert, $data_var[$i]);
        }
        return $data_insert;
    }

}