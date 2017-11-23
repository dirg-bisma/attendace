<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 9/19/2017
 * Time: 9:41 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Potonganmaster;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ;
use App\Models\Sync as Sync;

class SyncController extends Controller
{
    public function __construct()
    {

    }

    public function getTest()
    {
        return "test";
    }

    public function getAbsen(Request $request)
    {
        $sync = new Sync();
        $cek = $sync->Tabsen($request);
        if($cek == "1"){
            return 1;
        }else{
            return 0;
        }
    }

    public function getPegawai(Request $request)
    {
        $sync = new Sync();
        $cek = $sync->Pegawai($request);
        if($cek == "1"){
            return 1;
        }else{
            return 0;
        }
    }
}