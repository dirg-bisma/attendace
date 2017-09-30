<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/16/2017
 * Time: 6:47 PM
 */

namespace App\Models;


class TdetailTunjangan extends Sximo
{
    protected $table = 't_detail_tunjangan';
    protected $primaryKey = 'id_t_lap_gaji';
    public $timestamps = false;
}