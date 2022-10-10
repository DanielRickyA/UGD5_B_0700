<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\proyek;
use Illuminate\Support\Carbon;
use App\Models\Departemen;


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
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $departemens = Departemen::get();
        return view('proyek.create', compact('departemens'));
    }
    public function destroy($id)
    {
        $post = proyek::find($id);
        $post->delete();
        return redirect('/proyek')->with('success', 'Data telah dihapus');
    }

    public function edit($id)
    {
        $departemens = Departemen::get();
        $proyek = proyek::find($id);

        return view('proyek.edit', compact('departemens', 'proyek'));
    }

    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'nama_proyek' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'nilai_proyek' => 'required|gte:10000000',
        ]);
        //Fungsi Simpan Data ke dalam Database
        proyek::create([
            'nama_proyek' => $request->nama_proyek,
            'departemen_id' => $request->departemen_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'nilai_proyek' => $request->nilai_proyek,
            'status' => $request->status
        ]);

        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil ditambah']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_proyek' => 'required',
            'waktu_mulai' => 'required|date',
            'waktu_selesai' => 'required|date|after:waktu_mulai',
            'nilai_proyek' => 'required|gte:10000000',
        ]);

        proyek::find($id)->update([
            'nama_proyek' => $request->nama_proyek,
            'departemen_id' => $request->departemen_id,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'nilai_proyek' => $request->nilai_proyek,
            'status' => $request->status
        ]);

        return redirect()->route('proyek.index')->with(['success' => 'Data Berhasil diubah']);
    }
}
