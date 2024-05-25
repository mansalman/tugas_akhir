<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupDuaKmeansController extends Controller
{
    public function kmeans()
    {
        $dataAll = Data::all();
    $dipilih = Cluster::with('data')->get();

    // Inisialisasi centroid awal dari clusters yang dipilih
    $centroids = [
        ['nilai_t' => $dipilih[0]->data->nilai_t, 'nilai_f' => $dipilih[0]->data->nilai_f, 'nilai_h' => $dipilih[0]->data->nilai_h],
        ['nilai_t' => $dipilih[1]->data->nilai_t, 'nilai_f' => $dipilih[1]->data->nilai_f, 'nilai_h' => $dipilih[1]->data->nilai_h],
        ['nilai_t' => $dipilih[2]->data->nilai_t, 'nilai_f' => $dipilih[2]->data->nilai_f, 'nilai_h' => $dipilih[2]->data->nilai_h]
    ];

    $isChanged = true;
    $iterations = [];

    while ($isChanged) {
        $isChanged = false;

        foreach ($dataAll as $key => $data) {
            // Hitung jarak Euclidean ke setiap centroid
            $hasil0 = pow($data->nilai_t - $centroids[0]['nilai_t'], 2) + pow($data->nilai_f - $centroids[0]['nilai_f'], 2) + pow($data->nilai_h - $centroids[0]['nilai_h'], 2);
            $hasil1 = pow($data->nilai_t - $centroids[1]['nilai_t'], 2) + pow($data->nilai_f - $centroids[1]['nilai_f'], 2) + pow($data->nilai_h - $centroids[1]['nilai_h'], 2);
            $hasil2 = pow($data->nilai_t - $centroids[2]['nilai_t'], 2) + pow($data->nilai_f - $centroids[2]['nilai_f'], 2) + pow($data->nilai_h - $centroids[2]['nilai_h'], 2);

            $data->c0 = sqrt($hasil0);
            $data->c1 = sqrt($hasil1);
            $data->c2 = sqrt($hasil2);
            $data->mindis = min($data->c0, $data->c1, $data->c2);

            if ($data->mindis == $data->c0) {
                $data->cluster = 'Baik';
            } elseif ($data->mindis == $data->c1) {
                $data->cluster = 'Cukup Baik';
            } else {
                $data->cluster = 'Kurang Baik';
            }
        }

        // Simpan data iterasi saat ini
        $iterations[] = [
            'data' => $dataAll->map(function($item) {
                return [
                    'nilai_t' => $item->nilai_t,
                    'nilai_f' => $item->nilai_f,
                    'nilai_h' => $item->nilai_h,
                    'cluster' => $item->cluster,
                    'c0' => $item->c0,
                    'c1' => $item->c1,
                    'c2' => $item->c2,
                    'mindis' => $item->mindis,
                ];
            }),
            'centroids' => $centroids
        ];

        // Hitung centroid baru
        $count_c0 = $count_c1 = $count_c2 = 0;
        $sum_t_c0 = $sum_f_c0 = $sum_h_c0 = 0;
        $sum_t_c1 = $sum_f_c1 = $sum_h_c1 = 0;
        $sum_t_c2 = $sum_f_c2 = $sum_h_c2 = 0;

        foreach ($dataAll as $d) {
            if ($d->cluster == 'Baik') {
                $count_c0++;
                $sum_t_c0 += $d->nilai_t;
                $sum_f_c0 += $d->nilai_f;
                $sum_h_c0 += $d->nilai_h;
            } elseif ($d->cluster == 'Cukup Baik') {
                $count_c1++;
                $sum_t_c1 += $d->nilai_t;
                $sum_f_c1 += $d->nilai_f;
                $sum_h_c1 += $d->nilai_h;
            } else {
                $count_c2++;
                $sum_t_c2 += $d->nilai_t;
                $sum_f_c2 += $d->nilai_f;
                $sum_h_c2 += $d->nilai_h;
            }
        }

        $newCentroids = [
            ['nilai_t' => $count_c0 ? $sum_t_c0 / $count_c0 : $centroids[0]['nilai_t'], 'nilai_f' => $count_c0 ? $sum_f_c0 / $count_c0 : $centroids[0]['nilai_f'], 'nilai_h' => $count_c0 ? $sum_h_c0 / $count_c0 : $centroids[0]['nilai_h']],
            ['nilai_t' => $count_c1 ? $sum_t_c1 / $count_c1 : $centroids[1]['nilai_t'], 'nilai_f' => $count_c1 ? $sum_f_c1 / $count_c1 : $centroids[1]['nilai_f'], 'nilai_h' => $count_c1 ? $sum_h_c1 / $count_c1 : $centroids[1]['nilai_h']],
            ['nilai_t' => $count_c2 ? $sum_t_c2 / $count_c2 : $centroids[2]['nilai_t'], 'nilai_f' => $count_c2 ? $sum_f_c2 / $count_c2 : $centroids[2]['nilai_f'], 'nilai_h' => $count_c2 ? $sum_h_c2 / $count_c2 : $centroids[2]['nilai_h']]
        ];

        // Cek apakah centroid berubah
        if ($newCentroids !== $centroids) {
            $isChanged = true;
            $centroids = $newCentroids;
        }
    }

    return view('kmeans.baru', [
        'iterations' => $iterations
    ]);
}   
}