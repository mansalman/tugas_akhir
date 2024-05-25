@extends('layouts.main')
@section('container')
@php
$currentPage = $data->currentPage();
$perPage = $data->perPage();
$startNumber = ($currentPage - 1) * $perPage + 1;
@endphp

<div class="my-3 p-4 bg-body rounded shadow-sm mt-4">
    <div class="row">
        <div class="pb-3">
            <a class="btn btn-primary" href="data/tambah" type="button">Tambah</a>
            <a class="btn btn-danger" href="/data/delete-all" type="button">Clear All</a>
        </div>
        <form action="/data/import" method="post" enctype="multipart/form-data">
            @csrf
            <div class=" mb-3">
                <label for="formFileSm" class="form-label">Import Excel</label>
                <div class="row">
                    <div class="col-sm-8">
                        <input class="form-control form-control-sm @error('excel') is-invalid @enderror" id="formFileSm"
                            type="file" name="excel">
                        @error('excel')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="col-sm-4">
                        <button type="submit" class="btn btn-sm btn-success">UPLOAD</button>
                    </div>
                </div>
            </div>
        </form>
        <div class="pb-3">
            <form class="d-flex" action="/data" method="get">
                <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                    placeholder="Masukkan Kata Kunci" aria-label="Search">
            </form>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="bg-secondary text-white">
                <tr>
                    <th class="col-md text-center">NO</th>
                    <th class="col-md-1.25 text-center">NIUP</th>
                    <th class="col-md-3 text-center">NAMA LENGKAP</th>
                    <th class="col-md-1.25 text-center">WILAYAH</th>
                    <th class="col-md-1.25 text-center">DAERAH</th>
                    <th class="col-md-1.25 text-center">LEMBAGA</th>
                    <th class="col-md-1.25 text-center">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $i=>$d)
                <tr>
                    <td scope="row" class="text-center">{{$i + 1}}</td>
                    <td class="text-center">{{$d->niup}}</td>
                    <td>{{$d->nama_santri}}</td>
                    <td class="text-center">{{$d->wilayah}}</td>
                    <td class="text-center">{{$d->daerah}}</td>
                    <td class="text-center">{{$d->lembaga}}</td>
                    <td class="text-center">
                        <a class="btn btn-success" href="/data/edit/{{ $d->id}}" type="button">Edit</a>
                        <a href="/data/delete/{{ $d->id}}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{ $data->links()}}
@endsection