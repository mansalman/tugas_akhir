<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackupKmeansController extends Controller
{
    public function kmeans()
    {
        $dataAll = Data::all();
        $dipilih = Cluster::with('data')->get();
        
        foreach ($dataAll as $key => $data) {
            // Jumlah kuadrat dari perbedaan
            $hasil0 = pow($data->nilai_t - $dipilih[0]->data->nilai_t, 2) + pow($data->nilai_f - $dipilih[0]->data->nilai_f, 2) + pow($data->nilai_h - $dipilih[0]->data->nilai_h, 2);
            $hasil1 = pow($data->nilai_t - $dipilih[1]->data->nilai_t, 2) + pow($data->nilai_f - $dipilih[1]->data->nilai_f, 2) + pow($data->nilai_h - $dipilih[1]->data->nilai_h, 2);
            $hasil2 = pow($data->nilai_t - $dipilih[2]->data->nilai_t, 2) + pow($data->nilai_f - $dipilih[2]->data->nilai_f, 2) + pow($data->nilai_h - $dipilih[2]->data->nilai_h, 2);

            // Akar kuadrat dari jumlah kuadrat
            $data->c0 = sqrt($hasil0);
            $data->c1 = sqrt($hasil1);
            $data->c2 = sqrt($hasil2);
            $data->mindis = min($data->c0, $data->c1, $data->c2);
            
            // Set cluster berdasarkan nilai mindis
            if ($data->mindis == $data->c0) {
                $data->cluster = 'Baik';
            } elseif ($data->mindis == $data->c1) {
                $data->cluster = 'Cukup Baik';
            } elseif ($data->mindis == $data->c2) {
                $data->cluster = 'Kurang Baik';
            } else {
                // Atur cluster ke nilai default jika tidak ada yang cocok
                $data->cluster = 'nilai_default';
            }
        }
        // dd($dataAll);
        $count_c0 = 0;
        $count_c1 = 0;
        $count_c2 = 0;

        $sum_t_c0 = 0;
        $sum_f_c0 = 0;
        $sum_h_c0 = 0;

        $sum_t_c1 = 0;
        $sum_f_c1 = 0;
        $sum_h_c1 = 0;

        $sum_t_c2 = 0;
        $sum_f_c2 = 0;
        $sum_h_c2 = 0;

        // Loop melalui setiap data untuk menghitung jumlah data dalam setiap cluster
        // foreach ($dataAll as $d) {
        //     if ($d->cluster == 'Baik') {
        //         $count_c0++;
        //     } elseif ($d->cluster == 'Cukup Baik') {
        //         $count_c1++;
        //     } elseif ($d->cluster == 'Kurang Baik') {
        //         $count_c2++;
        //     }
        // }
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
            } elseif ($d->cluster == 'Kurang Baik') {
                $count_c2++;
                $sum_t_c2 += $d->nilai_t;
                $sum_f_c2 += $d->nilai_f;
                $sum_h_c2 += $d->nilai_h;
            }
        }
        // dump($ntc1);
        return view('kmeans.kmeans',[
            'data' => $dataAll,
            'count_c0' => $count_c0,
            'count_c1' => $count_c1,
            'count_c2' => $count_c2,
            'sum_t_c0' => $sum_t_c0,
            'sum_f_c0' => $sum_f_c0,
            'sum_h_c0' => $sum_h_c0,
            'sum_t_c1' => $sum_t_c1,
            'sum_f_c1' => $sum_f_c1,
            'sum_h_c1' => $sum_h_c1,
            'sum_t_c2' => $sum_t_c2,
            'sum_f_c2' => $sum_f_c2,
            'sum_h_c2' => $sum_h_c2,
        ]);
    }
 
}