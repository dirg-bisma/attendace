<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/16/2017
 * Time: 6:46 PM
 */

namespace App\Models;


class TdetailPotongan extends Sximo
{
    protected $table = 't_detail_potongan';
    protected $primaryKey = 'id_t_lap_gaji';
    public $timestamps = false;
}