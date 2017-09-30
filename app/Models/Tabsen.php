<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/26/2017
 * Time: 12:09 PM
 */

namespace App\Models;


class Tabsen extends Sximo
{
    protected $table = 't_absen';
    protected $primaryKey = 'id';
    public $timestamps = false;

}