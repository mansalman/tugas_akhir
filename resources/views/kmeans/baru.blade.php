@extends('layouts.main')

@section('container')
@php
$newStartNumber = 1;
$newnewStartNumber = 1;
$newnewnewStartNumber = 1;
@endphp
<div class=container>
    <div class="my -3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <h4>
                <p class="text-start">Hasil Perhitungan Metode K-Means</p>
            </h4>
            <!-- <div class="pb-3">
                <form class="d-flex" action="/kmeans/kmeans" method="get">
                    <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                        placeholder="Masukkan kata kunci" aria-label="Search">
                </form>
            </div> -->
            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h5>
                        <p class="text-start">Cluster Pertama (BAIK)</p>
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="col-md text-center">NO</th>
                                <th class="col-md-2 text-center">NIUP</th>
                                <th class="col-md-4 text-center">NAMA LENGKAP</th>
                                <th class="col-md-2 text-center">NILAI TAJWID</th>
                                <th class="col-md-2 text-center">NILAI FASHOHAH</th>
                                <th class="col-md-2 text-center">NILAI HAFALAN</th>
                            </tr>
                        <tbody>
                            @foreach($hasil['data'] as $i => $d)
                            @if($d['cluster'] === 'Baik')
                            <tr>
                                <td scope="row" class="text-center">{{ $newStartNumber++ }}</td>
                                <td class="text-center">{{$d['niup']}}</td>
                                <td>{{$d['nama_santri']}}</td>
                                <td class="text-center">{{$d['nilai_t']}}</td>
                                <td class="text-center">{{$d['nilai_f']}}</td>
                                <td class="text-center">{{$d['nilai_h']}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h5>
                        <p class="text-start">Cluster Kedua (CUKUP BAIK)</p>
                    </h5>

                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="col-md text-center">NO</th>
                                <th class="col-md-2 text-center">NIUP</th>
                                <th class="col-md-4 text-center">NAMA LENGKAP</th>
                                <th class="col-md-2 text-center">NILAI TAJWID</th>
                                <th class="col-md-2 text-center">NILAI FASHOHAH</th>
                                <th class="col-md-2 text-center">NILAI HAFALAN</th>
                            </tr>
                        <tbody>
                            @foreach($hasil['data'] as $i => $d)
                            @if($d['cluster'] === 'Cukup Baik')
                            <tr>
                                <td scope="row" class="text-center">{{ $newnewStartNumber++ }}</td>
                                <td class="text-center">{{$d['niup']}}</td>
                                <td>{{$d['nama_santri']}}</td>
                                <td class="text-center">{{$d['nilai_t']}}</td>
                                <td class="text-center">{{$d['nilai_f']}}</td>
                                <td class="text-center">{{$d['nilai_h']}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="my-3 p-3 bg-body rounded shadow-sm">
                <div class="mb-1 row">
                    <h5>
                        <p class="text-start">Cluster Ketiga (KURANG BAIK)</p>
                    </h5>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th class="col-md text-center">NO</th>
                                <th class="col-md-2 text-center">NIUP</th>
                                <th class="col-md-4 text-center">NAMA LENGKAP</th>
                                <th class="col-md-2 text-center">NILAI TAJWID</th>
                                <th class="col-md-2 text-center">NILAI FASHOHAH</th>
                                <th class="col-md-2 text-center">NILAI HAFALAN</th>
                            </tr>
                        <tbody>
                            @foreach($hasil['data'] as $i => $d)
                            @if($d['cluster'] === 'Kurang Baik')
                            <tr>
                                <td>{{ $newnewnewStartNumber++ }}</td>
                                <td class="text-center">{{$d['niup']}}</td>
                                <td>{{$d['nama_santri']}}</td>
                                <td class="text-center">{{$d['nilai_t']}}</td>
                                <td class="text-center">{{$d['nilai_f']}}</td>
                                <td class="text-center">{{$d['nilai_h']}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>

            <p class="d-inline-flex gap-1">
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample"
                    aria-expanded="false" aria-controls="collapseExample">
                    Tampilkan Iterasi Perhitungan
                </button>
            </p>
            <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    <!-- <div class="pb-3">
                        <form class="d-flex" action="/kmeans/baru" method="get">
                            <input class="form-control me-1" type="search" name="cari" value="{{ request('cari') }}"
                                placeholder="Masukkan kata kunci" aria-label="Search">
                        </form>
                    </div> -->
                    @foreach($iterations as $i => $itr)
                    <div class="p-3 bg-body rounded shadow-sm">
                        <div class="mb-1 row">
                            <h4 class="text-start">Iterasi Ke {{ $i + 1}}</h4>
                        </div>
                        <table class="table table-striped">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th class="col-md-2 text-center">CLUSTER</th>
                                    <th class="col-md-4 text-center">NILAI TAJWID</th>
                                    <th class="col-md-4 text-center">NILAI FASHOHAH</th>
                                    <th class="col-md-4 text-center">NILAI HAFALAN</th>
                                </tr>
                            <tbody>
                                @foreach($itr['centroids'] as $i => $c)
                                <tr>
                                    <td class="text-center">C{{$i+1}}</td>
                                    <td class="text-center">{{$c['nilai_t']}}</td>
                                    <td class="text-center">{{$c['nilai_f']}}</td>
                                    <td class="text-center">{{$c['nilai_h']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </thead>
                        </table>
                        <div class="table-responsive">
                            <table class="table table-striped" style="white-space:nowrap">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th class="col-md-1 text-center">NO</th>
                                        <th class="col-md-4 text-center">NIUP</th>
                                        <th class="col-md-4 text-center">NAMA LENGKAP</th>
                                        <th class="col-md-4 text-center">NILAI TAJWID</th>
                                        <th class="col-md-4 text-center">NILAI FASHOHAH</th>
                                        <th class="col-md-4 text-center">NILAI HAFALAN</th>
                                        <th class="col-md-4 text-center">C1</th>
                                        <th class="col-md-4 text-center">C2</th>
                                        <th class="col-md-4 text-center">C3</th>
                                        <th class="col-md-4 text-center">JARAK TERDEKAT</th>
                                        <th class="col-md-4 text-center">CLUSTER</th>
                                    </tr>
                                <tbody>
                                    @foreach($itr['data'] as $i => $d)
                                    <tr>
                                        <td>{{ $i+1 }}</td>
                                        <td class="text-center">{{$d['niup']}}</td>
                                        <td>{{$d['nama_santri']}}</td>
                                        <td class="text-center">{{$d['nilai_t']}}</td>
                                        <td class="text-center">{{$d['nilai_f']}}</td>
                                        <td class="text-center">{{$d['nilai_h']}}</td>
                                        <td class="text-center">{{$d['c0']}}</td>
                                        <td class="text-center">{{$d['c1']}}</td>
                                        <td class="text-center">{{$d['c2']}}</td>
                                        <td class="text-center">{{$d['mindis']}}</td>
                                        <td class="text-center">{{$d['cluster']}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection