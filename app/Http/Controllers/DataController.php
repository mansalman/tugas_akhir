<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Models\Data;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{                           

    public function index(Request $request){
        if($request->has('cari')){
            $keyword = $request->get('cari');
    
            $data = Data::where('niup', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_santri', 'like', '%' . $keyword . '%')
                        ->orWhere('wilayah', 'like', '%' . $keyword . '%')
                        ->orWhere('daerah', 'like', '%' . $keyword . '%')
                        ->orWhere('lembaga', 'like', '%' . $keyword . '%')
                        ->paginate();
        } else {
            $data = Data::paginate(50);
        }
    
        return view('data.index', [
            'title' => 'Data',
            'data' => $data
        ]);
    }
    
    public function tambah(){

        $tambah = Data::all();
        return view('data/tambah', [
            'title' => 'Tambah Data',
            'data' => $tambah
        ]);
    }

    public function simpan(Request $request)
    {
        $validated = $request -> validate([
            'niup' => 'required|numeric|unique:Data,niup',
            'nama_santri' => 'required',
            'wilayah' => 'required',
            'daerah' => 'required',
            'lembaga' => 'required',
            'nilai_t' => 'required|numeric|',
            'nilai_f' => 'required|numeric|',
            'nilai_h' => 'required|numeric|',
        ],
        [
            'niup.required' => 'NIUP Wajib Diisi',
            'niup.numeric' => 'NIUP Wajib Berupa Angka',
            'niup.unique' => 'NIUP Sudah Ada',
            'nama_santri.required' => 'Nama Variabel Wajib Diisi',
            'wilayah.required' => 'Wilayah Wajib Diisi',
            'daerah.required' => 'Daerah Wajib Diisi',
            'lembaga.required' => 'Lembaga Wajib Diisi',
            'nilai_t.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_f.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_h.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_t.required' => 'Nilai Tajwid Wajib Diisi',
            'nilai_f.required' => 'Nilai Fashohah Wajib Diisi',
            'nilai_h.required' => 'Nilai Hafalan Wajib Diisi',
        ]);

        Data::create($validated);
        return redirect()->to('/data')->with('success', 'Berhasil Menambahkan Data Santri');
    }

    public function edit($id){

        $data = Data::find($id);
        return view('data/edit', [
            'title' => 'Edit Data',
            'data' => $data
        ]);
    }

    public function update($id, Request $request)
    {
        $d = Data::find($id);
        $validated = $request -> validate([
            'nama_santri' => 'required',
            'wilayah' => 'required',
            'daerah' => 'required',
            'lembaga' => 'required',
            'nilai_t' => 'required|numeric|',
            'nilai_f' => 'required|numeric|',
            'nilai_h' => 'required|numeric|',
        ],
        [
            'nama_santri.required' => 'Nama Santri Wajib Diisi',
            'wilayah.required' => 'Wilayah Wajib Diisi',
            'daerah.required' => 'Daerah Wajib Diisi',
            'lembaga.required' => 'Lembaga Wajib Diisi',
            'nilai_t.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_f.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_h.numeric' => 'Nilai Wajib Berupa Angka',
            'nilai_t.required' => 'Nilai Tajwid Wajib Diisi',
            'nilai_f.required' => 'Nilai Fashohah Wajib Diisi',
            'nilai_h.required' => 'Nilai Hafalan Wajib Diisi',
        ]);

        $d->nama_santri = $validated['nama_santri'];
        $d->wilayah = $validated['wilayah'];
        $d->daerah = $validated['daerah'];
        $d->lembaga = $validated['lembaga'];
        $d->nilai_t = $validated['nilai_t'];
        $d->nilai_f = $validated['nilai_f'];
        $d->nilai_h = $validated['nilai_h'];
        $d->save();
        return redirect()->to('/data')->with('success', 'Berhasil Mengubah Data Santri');
    }

    public function destroy($id)
    {
        $d = Data::find($id);
        $d->delete();
        return redirect()->to('/data')->with('success', 'Berhasil Menghapus Data Santri');
    }

    public function destroyAll()
    {
        Data::truncate();
        return redirect()->to('/data')->with('success', 'Berhasil Menghapus Semua Data Santri');
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'excel' => 'required|mimes:xls,xlsx', ]);
        if ($request->file('excel')->isValid()) {
            $excel = $request->file('excel');
            Excel::import(new DataImport, request()->file('excel'));
            return redirect()->to('/data')->with('success', 'Berhasil Upload Data Santri');
            return redirect()->to('/data')->with('error', 'Upload gagal. Mohon unggah file Excel dengan tipe XLS atau XLSX');
        }
    }
}