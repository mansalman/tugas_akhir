@extends('layouts.main')
@section('container')

<div class=container>
    <div class="my -3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <h6>
                <p class="text-start">Data Centroid Cluster Pusat Awal Untuk Metode K-Means</p>
            </h6>
        </div>
        <div class="mb-3 row">
            <label for="nama_cluster" class="col-sm-2 col-form-label">Nama Cluster</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $cluster->nama_cluster }}" disabled readonly>
            </div>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-1 row">
                <h6>
                    <p class="text-center">Centroid Pusat Awal Yang Dipilih</p>
                </h6>

            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-2">NIUP</th>
                        <th class="col-md-4">Nama Lengkap</th>
                        <th class="col-md-2">Nilai Tajwid</th>
                        <th class="col-md-2">Nilai Fashohah</th>
                        <th class="col-md-2">Nilai Hafalan</th>
                    </tr>
                <tbody>
                    @if($cluster->data)
                    <tr>
                        <td>{{$cluster->data->niup}}</td>
                        <td>{{$cluster->data->nama_santri}}</td>
                        <td>{{$cluster->data->nilai_t}}</td>
                        <td>{{$cluster->data->nilai_f}}</td>
                        <td>{{$cluster->data->nilai_h}}</td>
                    </tr>
                    @endif
                </tbody>
                </thead>
            </table>
        </div>

        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-1 row">
                <h6>
                    <p class="text-center">Pilih Centroid Pusat Awal</p>
                </h6>
            </div>
            <div class="pb-3">
                <form class="d-flex" action="/cluster/pusatawal" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan kata kunci" aria-label="Search">
                </form>
            </div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-md-2">NIUP</th>
                        <th class="col-md-3">Nama Lengkap</th>
                        <th class="col-md-2">Nilai Tajwid</th>
                        <th class="col-md-2">Nilai Fashohah</th>
                        <th class="col-md-2">Nilai Hafalan</th>
                        <th class="col-md-1">Pilih</th>
                    </tr>
                <tbody>
                    @foreach($data as $i=>$d)
                    <tr>
                        <td>{{$d->niup}}</td>
                        <td>{{$d->nama_santri}}</td>
                        <td>{{$d->nilai_t}}</td>
                        <td>{{$d->nilai_f}}</td>
                        <td>{{$d->nilai_h}}</td>
                        <td>
                            <form action="/cluster/pusatawal/set/{{ $cluster->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id_data" value="{{ $d->id }}">
                                <button type="submit" class="btn btn-info">Pilih</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
        </div>

        @endsection