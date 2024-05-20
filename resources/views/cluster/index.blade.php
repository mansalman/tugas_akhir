@extends('layouts.main')
@section('container')
<div class="my-3 p-4 bg-body rounded shadow-sm">
    <table class="table table-striped">
        <div class="row">
            <div class="pb-3">
                <a class="btn btn-primary" href="cluster/tambah" type="button">Tambah
                    Cluster</a>
            </div>
            <div class="pb-3">
                <form class="d-flex" action="/cluster" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan Kata Kunci" aria-label="Search">
                </form>
            </div>
        </div>
</div>
<thead>
    <tr>
        <th class="col-md-2">NO</th>
        <th class="col-md-4">NAMA CLUSTER</th>
        <th class="col-md-4">CENTROID AWAL</th>
        <th class="col-md-2 text-center">AKSI</th>
    </tr>
</thead>
<tbody>
    @foreach($cluster as $i=> $c)
    <tr>
        <th scope="row">{{$i + 1}}</th>
        <td>{{$c->nama_cluster}}</td>
        <td>
            <a class="btn btn-info" href="/cluster/pusatawal/{{ $c->id}}" type="button">Pusat Awal</a>
        </td>
        <td class="text-center">
            <a class="btn btn-success" href="/cluster/edit/{{ $c->id}}" type="button">Edit</a>
            <a href="/cluster/delete/{{ $c->id}}" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    @endforeach
    <!-- Tambahkan baris sesuai kebutuhan -->
</tbody>
</table>

</div>
{{ $cluster->links()}}
@endsection