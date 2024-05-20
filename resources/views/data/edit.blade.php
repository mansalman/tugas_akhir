@extends('layouts.main')
@section('container')
<div class=container>
    <form action='/data/update/{{$data->id}}' method="post" class="row g-2">
        @csrf
        @method('PUT')
        <div class="my -3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="niup" class="col-sm-2 col-form-label">NIUP</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('niup') is-invalid @enderror" name="niup"
                        value="{{ old('niup') ?? $data->niup }}" id="niup" disabled readonly>
                    @error('niup')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nama_santri" class="col-sm-2 col-form-label">Nama Santri</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nama_santri') is-invalid @enderror"
                        name="nama_santri" value="{{ old('nama_santri') ?? $data->nama_santri }}" id="nama_santri">
                    @error('nama_santri')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('wilayah') is-invalid @enderror" name="wilayah"
                        value="{{ old('wilayah') ?? $data->wilayah }}" id="wilayah">
                    @error('wilayah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="daerah" class="col-sm-2 col-form-label">Daerah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('daerah') is-invalid @enderror" name="daerah"
                        value="{{ old('daerah') ?? $data->daerah }}" id="daerah">
                    @error('daerah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="lembaga" class="col-sm-2 col-form-label">Lembaga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('lembaga') is-invalid @enderror" name="lembaga"
                        value="{{ old('lembaga') ?? $data->lembaga }}" id="lembaga">
                    @error('lembaga')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nilai_t" class="col-sm-2 col-form-label">Nilai Tajwid</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai_t') is-invalid @enderror" name="nilai_t"
                        value="{{ old('nilai_t') ?? $data->nilai_t }}" id="nilai_t">
                    @error('nilai_t')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nilai_f" class="col-sm-2 col-form-label">Nilai Fashohah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai_f') is-invalid @enderror" name="nilai_f"
                        value="{{ old('nilai_f') ?? $data->nilai_f }}" id="nilai_f">
                    @error('nilai_f')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 row">
                <label for="nilai_h" class="col-sm-2 col-form-label">Nilai Hafalan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('nilai_h') is-invalid @enderror" name="nilai_h"
                        value="{{ old('nilai_h') ?? $data->nilai_h }}" id="nila_h">
                    @error('nilai_h')
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
                    <a class="btn btn-secondary" href="/data" type="button">Kembali</a>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection