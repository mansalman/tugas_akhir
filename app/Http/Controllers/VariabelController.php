<?php

namespace App\Http\Controllers;

use App\Models\Variabel;
use Illuminate\Http\Request;

class VariabelController extends Controller
{                           

    public function index(Request $request){
        if($request->get('cari')){
            $variabel = Variabel::where('kode_variabel', 'like', '%' . $request->get('cari' ) . '%')->orWhere('nama_variabel', 'like', '%' . $request->get('cari' ) . '%')->paginate(4);
        } else {
            $variabel = Variabel::paginate(4);
        }
        return view('variabel.index', [
            'title' => 'Variabel',
            'variabel' => $variabel
        ]);
    }
    
    public function tambah(){

        $tambah = Variabel::all();
        return view('variabel/tambah', [
            'title' => 'Tambah Variabel',
            'variabel' => $tambah
        ]);
    }

    public function simpan(Request $request)
    {
        $validated = $request -> validate([
            'kode_variabel' => 'required|unique:Variabel,kode_variabel',
            'nama_variabel' => 'required',
        ],
        [
            'kode_variabel.required' => 'Kode Variabel Wajib Diisi',
            'kode_variabel.unique' => 'Kode Variabel Sudah Ada',
            'nama_variabel.required' => 'Nama Variabel Wajib Diisi'
        ]);

        Variabel::create($validated);
        return redirect()->to('/variabel')->with('success', 'Berhasil Menambahkan Data Variabel');
    }

    public function edit($id){

        $variabel = Variabel::find($id);
        return view('variabel/edit', [
            'title' => 'Edit Variabel',
            'variabel' => $variabel
        ]);
    }

    public function update($id, Request $request)
    {
        $v = Variabel::find($id);
        $validated = $request -> validate([
            'nama_variabel' => 'required',
        ],
        [
            'nama_variabel.required' => 'Nama Variabel Wajib Diisi'
        ]);

        $v->nama_variabel = $validated['nama_variabel'];
        $v->save();
        return redirect()->to('/variabel')->with('success', 'Berhasil Mengubah Data Variabel');
    }

    public function destroy($id)
    {
        $v = Variabel::find($id);
        $v->delete();
        return redirect()->to('/variabel')->with('success', 'Berhasil Menghapus Data Variabel');
    }
}