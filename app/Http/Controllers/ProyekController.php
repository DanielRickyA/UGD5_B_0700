<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyek;
use Illuminate\Support\Carbon;


class ProyekController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $proyek = proyek::paginate(5);
        //render view with posts
        $ubahTanggal = function ($tanggal) {
            $tgl_new = Carbon::parse($tanggal)->locale('id-ID');
            return $tgl_new->translatedFOrmat('j F Y');
        };

        return view('proyek.index', compact('proyek', 'ubahTanggal'));
    }
}
