@extends('layouts.main')
@section('container')

<div class=container>
    <form action='/kmeans' method="post" class="row g-4">
        @csrf
        <div class="my -3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <h6>
                    <p class="text-start">Hasil Perhitungan Metode K-Means</p>
                </h6>
            </div>

            <div class="pb-1">
                <form class="d-flex" action="/kmeans" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan kata kunci" aria-label="Search">
                </form>
            </div>
    </form>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-1 row">
            <h4>
                <p class="text-start">Cluster Pertama</p>
            </h4>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">NIUP</th>
                    <th class="col-md-3">Nama Lengkap</th>
                    <th class="col-md-1">Tajwid</th>
                    <th class="col-md-1">Fashohah</th>
                    <th class="col-md-2">Hafalan</th>
                    <th class="col-md-2">Cluster</th>
                </tr>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>Cluster Pertama</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-1 row">
            <h4>
                <p class="text-start">Cluster Kedua</p>
            </h4>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">NIUP</th>
                    <th class="col-md-3">Nama Lengkap</th>
                    <th class="col-md-1">Tajwid</th>
                    <th class="col-md-1">Fashohah</th>
                    <th class="col-md-2">Hafalan</th>
                    <th class="col-md-2">Cluster</th>
                </tr>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>Cluster Kedua</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-1 row">
            <h4>
                <p class="text-start">Cluster Ketiga</p>
            </h4>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">NIUP</th>
                    <th class="col-md-3">Nama Lengkap</th>
                    <th class="col-md-1">Tajwid</th>
                    <th class="col-md-1">Fashohah</th>
                    <th class="col-md-2">Hafalan</th>
                    <th class="col-md-2">Cluster</th>
                </tr>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>Cluster Ketiga</td>
                </tr>
            </tbody>
            </thead>
        </table>
    </div>

    <div class="mb-4 row">
        <h4>
            <a class="btn btn-info" type="button">Tampilkan Iterasi Perhitungan</a>
        </h4>
    </div>

    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-1 row">
            <h4>
                <p class="text-start">Iterasi Pertama</p>
            </h4>
        </div>

        <h5>
            <p class="text-center">Centroid Awal</p>
        </h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-5"></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-2"></th>
                </tr>
            <tbody>
                <tr>
                    <td>Cluster 1</td>
                    <td>90</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Cluster 2</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Cluster 3</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
            </tbody>
            </thead>
        </table>

        <div class="mb-4 row">
            <h2>
                <p class="text-start"></p>
            </h2>
        </div>

        <h5>
            <p class="text-center">Jarak Ke Centroid</p>
        </h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-2">NIUP</th>
                    <th class="col-md-3">Nama Lengkap</th>
                    <th class="col-md-1">Cluster 1</th>
                    <th class="col-md-1">Cluster 2</th>
                    <th class="col-md-1">Cluster 3</th>
                    <th class="col-md-2">Kedekatan</th>
                    <th class="col-md-3">Cluster</th>
                </tr>
            <tbody>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                    <td>0</td>
                    <td>Cluster 1</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>50</td>
                    <td>50</td>
                    <td>50</td>
                    <td>1</td>
                    <td>Cluster 2</td>
                </tr>
                <tr>
                    <td>123</td>
                    <td>CCCCC</td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td>2</td>
                    <td>Cluster 3</td>
                </tr>
            </tbody>
            </thead>
        </table>

        <div class="mb-4 row">
            <h2>
                <p class="text-start"></p>
            </h2>
        </div>
        <h5>
            <p class="text-center">Centroid Baru</p>
        </h5>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-5"></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-2"></th>
                    <th class="col-md-2"></th>
                </tr>
            <tbody>
                <tr>
                    <td>Cluster 1</td>
                    <td>90</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Cluster 2</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
                <tr>
                    <td>Cluster 3</td>
                    <td>100</td>
                    <td>100</td>
                    <td>100</td>
                </tr>
            </tbody>
            </thead>
        </table>

    </div>

    @endsection