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
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="bg-secondary text-white">
                    <tr>
                        <th class="col-md-1 text-center">NO</th>
                        <th class="col-md-4 text-center">NAMA CLUSTER</th>
                        <th class="col-md-4 text-center">CENTROID AWAL</th>
                        <th class="col-md-2 text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cluster as $i=> $c)
                    <tr>
                        <td scope="row" class="text-center">{{$i + 1}}</td>
                        <td>{{$c->nama_cluster}}</td>
                        <td class="text-center">
                            <a class="btn btn-info" href="/cluster/pusatawal/{{ $c->id}}" type="button">Pusat Awal</a>
                        </td>
                        <td class="text-center">
                            <a class="btn btn-success" href="/cluster/edit/{{ $c->id}}" type="button">Edit</a>
                            <a href="/cluster/delete/{{ $c->id}}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
        </div>
        <!-- Tambahkan baris sesuai kebutuhan -->
        </tbody>
    </table>
</div>
</table>

</div>
{{ $cluster->links()}}
@endsection