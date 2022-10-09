<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
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
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $departemens = Departemen::get();
        return view('pegawai.create', compact('departemens'));
    }

    public function destroy($id)
    {
        $post = pegawai::find($id);
        $post->delete();
        return redirect('/pegawai')->with('success', 'Data telah dihapus');
    }

    public function edit($id)
    {
        $departemens = Departemen::get();
        $pegawai = pegawai::find($id);

        return view('pegawai.edit', compact('departemens', 'pegawai'));
    }


    public function store(Request $request)
    {
        //Validasi Formulir
        $this->validate($request, [
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required|max:15',
            'id_departemen' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|regex:/^(08)[0-9]{4,5}$/',
            'gender' => 'required',
            'gaji_pokok' => 'required|gte:2000000',
            'status' => 'required',
        ]);
        //Fungsi Simpan Data ke dalam Database
        pegawai::create([
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'id_departemen' => $request->id_departemen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $request->status,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil ditambah']);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nomor_induk_pegawai' => 'required',
            'nama_pegawai' => 'required|max:15',
            'id_departemen' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|regex:/^(08)[0-9]{4,5}$/',
            'gender' => 'required',
            'gaji_pokok' => 'required|gte:2000000',
            'status' => 'required',
        ]);

        pegawai::find($id)->update([
            'nomor_induk_pegawai' => $request->nomor_induk_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'id_departemen' => $request->id_departemen,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'gender' => $request->gender,
            'gaji_pokok' => $request->gaji_pokok,
            'status' => $request->status,


        ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil diubah']);
    }
}
