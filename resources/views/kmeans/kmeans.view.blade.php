@extends('layouts.main')
@section('container')
<div class=container>
    <div class="my -3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <h6>
                <p class="text-start">Hasil Perhitungan Metode K-Means</p>
            </h6>
            <div class="pb-3">
                <form class="d-flex" action="/kmeans/kmeans" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan kata kunci" aria-label="Search">
                </form>
            </div>
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h6>
                        <p class="text-start">Cluster Pertama Baik</p>
                    </h6>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md">No</th>
                            <th class="col-md-2">NIUP</th>
                            <th class="col-md-4">Nama Lengkap</th>
                            <th class="col-md-2">Nilai Tajwid</th>
                            <th class="col-md-2">Nilai Fashohah</th>
                            <th class="col-md-2">Nilai Hafalan</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>111</td>
                            <td>dsdsd</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h6>
                        <p class="text-start">Cluster Kedua Cukup Baik</p>
                    </h6>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md">No</th>
                            <th class="col-md-2">NIUP</th>
                            <th class="col-md-4">Nama Lengkap</th>
                            <th class="col-md-2">Nilai Tajwid</th>
                            <th class="col-md-2">Nilai Fashohah</th>
                            <th class="col-md-2">Nilai Hafalan</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>111</td>
                            <td>dsdsd</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h6>
                        <p class="text-start">Cluster Ketiga Kurang Baik</p>
                    </h6>

                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md">No</th>
                            <th class="col-md-2">NIUP</th>
                            <th class="col-md-4">Nama Lengkap</th>
                            <th class="col-md-2">Nilai Tajwid</th>
                            <th class="col-md-2">Nilai Fashohah</th>
                            <th class="col-md-2">Nilai Hafalan</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>111</td>
                            <td>dsdsd</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>

            <div>
                <button type="submit" class="btn btn-info">Tampilkan Iterasi Perhitungan</button>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h4>
                        <p class="text-start">Iterasi</p>
                    </h4>
                </div>
                <div class="mb-1 row">
                    <h6>
                        <p class="text-center">Centroid Awal</p>
                    </h6>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-3">Cluster</th>
                            <th class="col-md-2">Nilai Tajwid</th>
                            <th class="col-md-2">Nilai Fashohah</th>
                            <th class="col-md-2">Nilai Hafalan</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Cluster Baik</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
                <div class="mb-1 row">
                    <h6>
                        <p class="text-center">Jarak Ke Centroid</p>
                    </h6>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-2">NIUP</th>
                            <th class="col-md-2">Nama Lengkap</th>
                            <th class="col-md-1">C1</th>
                            <th class="col-md-1">C2</th>
                            <th class="col-md-1">C3</th>
                            <th class="col-md-2">Kedekatan</th>
                            <th class="col-md-2">Cluster</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>111</td>
                            <td>ddd</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                            <td>Cluster Baik</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
                <div class="mb-1 row">
                    <h6>
                        <p class="text-center">Centroid Baru</p>
                    </h6>
                </div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-3">Cluster</th>
                            <th class="col-md-2">Nilai Tajwid</th>
                            <th class="col-md-2">Nilai Fashohah</th>
                            <th class="col-md-2">Nilai Hafalan</th>
                        </tr>
                    <tbody>
                        <tr>
                            <td>Cluster Baik</td>
                            <td>111</td>
                            <td>111</td>
                            <td>111</td>
                        </tr>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection