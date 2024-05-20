<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Data;
use Illuminate\Http\Request;

class ClusterController extends Controller
{
    public function index(Request $request){
        if($request->get('cari')){
            $cluster = Cluster::where('nama_cluster', 'like', '%' . $request->get('cari' ) . '%')->paginate(4);
        } else {
            $cluster = Cluster::paginate(4);
        }
        return view('cluster.index', [
            'title' => 'Cluster',
            'cluster' => $cluster
        ]);
    }
    
    public function tambah(){

        $tambah = Cluster::all();
        return view('cluster/tambah', [
            'title' => 'Tambah Cluster',
            'cluster' => $tambah
        ]);
    }

    public function simpan(Request $request)
    {
        $validated = $request -> validate([
            'nama_cluster' => 'required|unique:Cluster,nama_cluster',
        ],
        [
            'nama_cluster.unique' => 'Nama Cluster Sudah Ada',
            'nama_cluster.required' => 'Nama Cluster Wajib Diisi'
        ]);

        Cluster::create($validated);
        return redirect()->to('/cluster')->with('success', 'Berhasil Menambahkan Data Cluster');
    }

    public function edit($id){

        $cluster = Cluster::find($id);
        return view('cluster/edit', [
            'title' => 'Edit Cluster',
            'cluster' => $cluster
        ]);
    }

    public function pusatawal($id)
    {

        $cluster = Cluster::where('id', $id)->with(['data'])->first();
        $data = Data::all();
        
        return view('cluster/pusatawal', [
            'title' => 'Pusat Awal',
            'cluster' => $cluster,
            'data' => $data,
        ]);
    }

    public function setPusatAwal(Request $request, $id)
    {
        $cl = Cluster::find($id);

        $cl->data_id = $request->input('id_data');
        $cl->save();

        return redirect()->to('/cluster/pusatawal/' . $id)->with('success', 'Berhasil Menentukan Pusat Awal');
    }

    public function update($id, Request $request)
    {
        $c = Cluster::find($id);
        $validated = $request -> validate([
            'nama_cluster' => 'required',
        ],
        [
            'nama_cluster.required' => 'Nama Cluster Wajib Diisi'
        ]);

        $c->nama_cluster = $validated['nama_cluster'];
        $c->save();
        return redirect()->to('/cluster')->with('success', 'Berhasil Mengubah Data Cluster');
    }

    public function destroy($id)
    {
        $c = Cluster::find($id);
        $c->delete();
        return redirect()->to('/cluster')->with('success', 'Berhasil Menghapus Data Cluster');
    }
}