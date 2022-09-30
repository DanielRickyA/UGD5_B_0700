<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pegawai;

class PegawaiController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $pegawai = pegawai::paginate(5);
        //render view with posts
        return view('pegawai.index', compact('pegawai'));
    }
}
