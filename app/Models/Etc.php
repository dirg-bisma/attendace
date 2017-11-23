<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 8/23/2017
 * Time: 11:31 PM
 */

namespace App\Models;


class Etc
{
    public function indonesian_date ($timestamp = '', $date_format = 'l, j F Y | H:i', $suffix = 'WIB') {
        if (trim ($timestamp) == '')
        {
            $timestamp = time ();
        }
        elseif (!ctype_digit ($timestamp))
        {
            $timestamp = strtotime ($timestamp);
        }
        # remove S (st,nd,rd,th) there are no such things in indonesia :p
        $date_format = preg_replace ("/S/", "", $date_format);
        $pattern = array (
            '/Mon[^day]/','/Tue[^sday]/','/Wed[^nesday]/','/Thu[^rsday]/',
            '/Fri[^day]/','/Sat[^urday]/','/Sun[^day]/','/Monday/','/Tuesday/',
            '/Wednesday/','/Thursday/','/Friday/','/Saturday/','/Sunday/',
            '/Jan[^uary]/','/Feb[^ruary]/','/Mar[^ch]/','/Apr[^il]/','/May/',
            '/Jun[^e]/','/Jul[^y]/','/Aug[^ust]/','/Sep[^tember]/','/Oct[^ober]/',
            '/Nov[^ember]/','/Dec[^ember]/','/January/','/February/','/March/',
            '/April/','/June/','/July/','/August/','/September/','/October/',
            '/November/','/December/',
        );
        $replace = array ( 'Sen','Sel','Rab','Kam','Jum','Sab','Min',
            'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu',
            'Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des',
            'Januari','Februari','Maret','April','Juni','Juli','Agustus','Sepember',
            'Oktober','November','Desember',
        );
        $date = date ($date_format, $timestamp);
        $date = preg_replace ($pattern, $replace, $date);
        $date = "{$date} {$suffix}";
        return $date;
    }

    public function CariArray($key, $arr){
        foreach($arr as $data){
            if(strpos($key,$data) == $data)
                return true;
        }
    }

    public function terbilang($x) {
        $x=abs($x);
        $angka=array("","satu","dua","tiga","empat","lima",
            "enam","tujuh","delapan","sembilan","sepuluh","sebelas");
        $temp="";
        if($x<12){
            $temp=" ".$angka[$x];
        }elseif($x<20){
            $temp=$this->terbilang($x-10)." belas";
        }elseif($x<100){
            $temp=$this->terbilang($x/10)." puluh".$this->terbilang($x%10);
        }elseif($x<200){
            $temp=" seratus".$this->terbilang($x-100);
        }elseif($x<1000){
            $temp=$this->terbilang($x/100)." ratus".$this->terbilang($x%100);
        }elseif($x<2000){
            $temp=" seribu".$this->terbilang($x-1000);
        }elseif($x<1000000){
            $temp=$this->terbilang(abs($x)/1000)." ribu".$this->terbilang(abs($x)%1000);
        }elseif($x<1000000000){
            $temp=$this->terbilang($x/1000000)." juta".$this->terbilang($x%1000000);
        }elseif($x<1000000000000){
            $temp=$this->terbilang($x/1000000000)." milyar".$this->terbilang(fmod($x,1000000000));
        }elseif($x<1000000000000000){
            $temp=$this->terbilang($x/1000000000000)." trilyun".$this->terbilang(fmod($x,1000000000000));
        }
        return$temp;
    }


}