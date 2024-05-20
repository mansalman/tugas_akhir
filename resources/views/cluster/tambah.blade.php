@extends('layouts.main')
@section('container')

<div class=container>
    <form action='/cluster/simpan' method="post" class="row g-2">
        @csrf
        <div class="my -3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama_cluster" class="col-sm-2 col-form-label">Nama Cluster</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_cluster') is-invalid @enderror"
                        name="nama_cluster" value="{{ old('nama_cluster') }}" id="nama_cluster">
                    @error('nama_cluster')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_cluster" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Simpan Data</button>
                    <a class="btn btn-secondary" href="/cluster" type="button">Kembali</a>
                </div>
            </div>
        </div>

    </form>
</div>

@endsection