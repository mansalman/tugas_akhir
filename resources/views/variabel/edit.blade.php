@extends('layouts.main')
@section('container')
<div class=container>
    <form action='/variabel/update/{{$variabel->id}}' method="post" class="row g-2">
        @csrf
        @method('PUT')
        <div class="my -3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nim" class="col-sm-2 col-form-label">Kode Variabel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('kode_variabel') is-invalid @enderror"
                        name="kode_variabel" value="{{ old('kode_variabel') ?? $variabel->kode_variabel }}"
                        id="kode_variabel" disabled readonly>
                    @error('kode_variabel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama Variabel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_variabel') is-invalid @enderror"
                        name="nama_variabel" value="{{ old('nama_variabel') ?? $variabel->nama_variabel }}"
                        id="nama_variabel">
                    @error('nama_variabel')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_variabel" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
                    <a class="btn btn-secondary" href="/variabel" type="button">Kembali</a>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection