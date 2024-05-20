@extends('layouts.main')
@section('container')
<div class="my-3 p-4 bg-body rounded shadow-sm mt-4">
    <table class="table table-striped">
        <div class="row">
            <div class="pb-3">
                <a class="btn btn-primary" href="variabel/tambah" type="button">Tambah
                    Variabel</a>
            </div>
            <div class="pb-3">
                <form class="d-flex" action="/variabel" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan Kata Kunci" aria-label="Search">
                </form>
            </div>
        </div>
</div>
<thead>
    <tr>
        <th class="col-md-1">NO</th>
        <th class="col-md-3">KODE VARIABEL</th>
        <th class="col-md-4 text-center">NAMA VARIABEL</th>
        <th class="col-md-2 text-center">AKSI</th>
    </tr>
</thead>
<tbody>
    @foreach($variabel as $i=> $v)
    <tr>
        <th scope="row">{{$i + 1}}</th>
        <td>{{$v->kode_variabel}}</td>
        <td>{{$v->nama_variabel}}</td>
        <td class="text-center">
            <a class="btn btn-success" href="/variabel/edit/{{ $v->id}}" type="button">Edit</a>
            <a href="/variabel/delete/{{ $v->id}}" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    @endforeach
    <!-- Tambahkan baris sesuai kebutuhan -->
</tbody>
</table>

</div>
{{ $variabel->links()}}
@endsection