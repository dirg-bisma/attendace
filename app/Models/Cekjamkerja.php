<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 8/24/2017
 * Time: 3:36 AM
 */

namespace App\Models;

use App\Models\Absensiraw as Absenraw;

class Cekjamkerja
{
    public function Carirawdata($tgl, $id_jam, $id_pegawai, $hari){
        $jamkerja = new Jamkerja();
        $absenraw = new Absenraw();
        $dinasraw = new Absendinas();
        $datanonGlobal = $jamkerja->where('parent', $id_jam)->where('hari', $hari)->first();
        $pattern = '/\d{4}\-\d{2}-\d{2}\s/';
        if(count($datanonGlobal)>0){
            $data = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array("$tgl $datanonGlobal->jam_awal", "$tgl $datanonGlobal->jam_akhir"))
                ->orderBy('tgl', 'ASC')
                ->first();
            if(count($data)>0){
                return preg_replace($pattern, "", $data->tgl);
            }else{
                $data_dinas = $dinasraw->where('id_pegawai', $id_pegawai)
                    ->whereBetween('tgl', array("$tgl $datanonGlobal->jam_awal", "$tgl $datanonGlobal->jam_akhir"))
                    ->orderBy('tgl', 'ASC')
                    ->first();
                if(count($data_dinas)>0){
                    return preg_replace($pattern, "", $data_dinas->tgl);
                }else{
                    return "-#-";
                }

            }
        }else{
            $dataGlobal = $jamkerja->where('id_jam', $id_jam)->first();
            $data = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array("$tgl $dataGlobal->jam_awal", "$tgl $dataGlobal->jam_akhir"))
                ->orderBy('tgl', 'ASC')
                ->first();
            if(count($data)>0){
                return preg_replace($pattern, "", $data->tgl);
            }else{
                $data_dinas = $dinasraw->where('id_pegawai', $id_pegawai)
                    ->whereBetween('tgl', array("$tgl $dataGlobal->jam_awal", "$tgl $dataGlobal->jam_akhir"))
                    ->orderBy('tgl', 'ASC')
                    ->first();
                if(count($data_dinas)>0){
                    return preg_replace($pattern, "", $data_dinas->tgl);
                }else{
                    return "-#-";
                }
            }
        }

    }

    public function Carirawdatalembur($tgl, $id_pegawai, $hari){
        $jamkerja = new Lemburjam();
        $absenraw = new Absenraw();
        $datanonGlobal = $jamkerja->where('hari', $hari)
            ->where('global', 'T')
            ->first();
        if(count($datanonGlobal)>0){
            $data_a = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array($tgl . " " . $datanonGlobal->jam_mulai, $tgl . " " . $datanonGlobal->jam_akhir))
                ->orderBy('tgl', 'ASC')
                ->first();
            $data_b = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array($tgl . " " . $datanonGlobal->jam_mulai, $tgl . " " . $datanonGlobal->jam_akhir))
                ->orderBy('tgl', 'DESC')
                ->first();
            if(count($data_a) > 0){
                $jam_lembur = date_diff(date_create($data_a->tgl),  date_create($data_b->tgl));
                return $jam_lembur->format("%H:%i");
            }else{
                return "-*-";
            }
        }else{
            $dataGlobal = $jamkerja->where('global', 'Y')->first();
            $data_a = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array($tgl." ".$dataGlobal->jam_mulai, $tgl." ".$dataGlobal->jam_akhir))
                ->orderBy('tgl', 'ASC')
                ->first();
            $data_b = $absenraw->where('id_pegawai', $id_pegawai)
                ->whereBetween('tgl', array($tgl." ".$dataGlobal->jam_mulai, $tgl." ".$dataGlobal->jam_akhir))
                ->orderBy('tgl', 'DESC')
                ->first();
            if(count($data_a) > 0){
                $jam_lembur = date_diff(date_create($data_a->tgl),  date_create($data_b->tgl));
                return $jam_lembur->format("%H:%i%i");
            }else{
                return "-*-";
            }
        }
    }

    public function TimeAdd($time_a, $time_b){
        $waktua = explode(":",$time_a);
        $waktub = explode(":", $time_b);

        $menita = intval($waktua[1])+intval($waktub[1]);
        $sisamenit = 0;
        $sisajam = 0;
        if($menita >= 60){
            $sisamenit = $menita % 60;
            $sisajam = round($menita/60, 0, PHP_ROUND_HALF_DOWN);
        }

        $menitb = (intval($waktua[0])+intval($waktub[0])+$sisajam)*60;
        $add_menit = ($menitb+$sisamenit) % 60;
        $add_jam = round(($menitb+$sisamenit)/60, 0, PHP_ROUND_HALF_DOWN);
        if($add_menit < 10){
            $num_pad = sprintf("%02d", $add_menit);
            return $add_jam.":".$num_pad;
        }else{
            return $add_jam.":".$add_menit;
        }

    }


}