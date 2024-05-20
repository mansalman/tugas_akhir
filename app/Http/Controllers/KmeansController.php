<?php

namespace App\Http\Controllers;

use App\Models\Cluster;
use App\Models\Data;
use App\Models\Kmeans;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class KmeansController extends Controller

{
    public function kmeans()
    {
        // Mendapatkan semua data
        $dataPoints = Data::select('nilai_t', 'nilai_f', 'nilai_h')->get()->toArray();
        
        // Inisialisasi centroid awal dari tabel cluster
        $centroids = Cluster::pluck('nama_cluster')->toArray();
        
        // Iterasi maksimum
        $maxIterations = 100;
        
        // Melakukan iterasi hingga mencapai iterasi maksimum
        for ($iteration = 0; $iteration < $maxIterations; $iteration++) {
            // Langkah 3: Pembagian ke Cluster
            $clusters = [];
            foreach ($dataPoints as $data) {
                $minDistance = INF;
                $closestCentroid = null;
                foreach ($centroids as $centroid) {
                    $distance = $this->euclideanDistance($data, $centroid);
                    if ($distance < $minDistance) {
                        $minDistance = $distance;
                        $closestCentroid = $centroid;
                    }
                }
                $clusters[$closestCentroid][] = $data;
            }
            
            // Langkah 4: Perhitungan Centroid Baru
            $newCentroids = [];
            foreach ($clusters as $centroid => $clusterPoints) {
                $totalPoints = count($clusterPoints);
                $sum = array_fill(0, count($dataPoints[0]), 0); // Inisialisasi array jumlah untuk centroid baru
                foreach ($clusterPoints as $point) {
                    foreach ($point as $key => $value) {
                        $sum[$key] += $value;
                    }
                }
                $newCentroids[$centroid] = array_map(function($value) use ($totalPoints) {
                    return $value / $totalPoints;
                }, $sum);
            }
            
            // Cek apakah centroid baru sama dengan centroid sebelumnya
            if ($newCentroids === $centroids) {
                // Jika ya, hentikan iterasi
                break;
            } else {
                // Jika tidak, update centroid dengan yang baru
                $centroids = $newCentroids;
            }
        }
        
        // Kembalikan hasil ke view
        return view('kmeans.kmeans', [
            'centroids' => $centroids,
            'clusters' => $clusters,
            'iterations' => $iteration + 1
        ]);
    }
    
    private function euclideanDistance($point1, $point2)
    {
        $sum = 0;
        foreach ($point1 as $key => $value) {
            $sum += pow($value - $point2[$key], 2);
        }
        return sqrt($sum);
    }
}
// public function kmeans(){ 
//     //init var data array       
//     $data = [];
//     $name = [];

//     $dataDisasters = Data::all();
//     //dd($dataDisasters);
//     //# looping change from collection array
//     foreach($dataDisasters as $row){
//         $data[] = $row;
//         $name[] = $row['niup'];
//     }
//     //dd($name);
//     //dd($earlydata);
//     $data = [];
//     //# looping change array to row(indexing)
//     foreach($dataDisasters as $row){
//         $data[]=[
//             $row['niup'],
//             $row['nama_santri'],
//             $row['nilai_t'],
//             $row['nilai_f'],
//             $row['nilai_h'],
//         ];            
//     }
//     //dd($earlydata);

//     //# set K based on method,I set 3
//     $cluster = 3;

//     //# var centroid call method earlyCentroid
//     $centroid=$this->earlyCentroid($data,$cluster);
//     // dd($centroid[0]);                        
//     $hasil_iterasi=[];
//     $hasil_cluster=[];
//     $itr=0;        

//     //-----------------K-MEANS-------------------
//     while (true) {
//         $iterasi = array();
//         foreach ($data as $key => $valuedata) {
//             //dd($valuedata);
//             $iterasi[$key]['data']=$valuedata;
//             //dd($valuedata);
//             //# value centroid => earlycentroid
//             foreach ($centroid[$itr] as $key_centroid => $valuecentroid) {
//                 //dd($valuecentroid);
//                 //# array 2d jarak
//                 $iterasi[$key]['jarak_ke_centroid'][]=$this->distance($valuedata,$valuecentroid);
//                 //dd($iterasi);
//             }
//             //# array 2d jarak terdekat
//             $iterasi[$key]['jarak_terdekat']=$this->nearDistance($iterasi[$key]['jarak_ke_centroid'],$centroid);
//             //dd($iterasi);
//         }
//         //# push two array into 1 array
//         array_push($hasil_iterasi, $iterasi);        
//         //dd($hasil_iterasi, $iterasi , $hasil_cluster); 
//         $centroid[++$itr]=$this->newCentroid($iterasi,$hasil_cluster);
//         //dd($centroid);
//         $lanjutkan=$this->centroidChange($centroid,$itr);
//         $boolval = boolval($lanjutkan) ? 'ya' : 'tidak';
//         //# checking if centroid not change it will break        
//         if(!$lanjutkan)
//         break;
//     }
//     $result_centroid = last($centroid);
//     //dd($result_centroid);
//     $result_iterasi = last($hasil_iterasi);
//     //dd($result_iterasi);        
//     Kmeans::deleteHelper();
//     //dd($result_iterasi);
//     foreach ($result_iterasi as $key => $value) {
//         # code...
//         //dd($value);
//         $dcentroid1 = $value["jarak_ke_centroid"][0];
//         $dcentroid2 = $value["jarak_ke_centroid"][1];
//         $dcentroid3 = $value["jarak_ke_centroid"][2];
//         $mindistance = $value["jarak_terdekat"]["value"];
//         $clusterall = $value["jarak_terdekat"]["cluster"];        
//         Kmeans::saveHelper($dcentroid1, $dcentroid2, $dcentroid3,$mindistance,$clusterall);
//     }
//     //dd(end($hasil_iterasi));

//     //------------------------DAVIES BOULDIN INDEX------------------
//     //# var rs call method from model(collection) then change to array
//     $rs = Kmeans::groupClusterHelper()->toArray();        
//     //dd($rs);
//     //# var ssw call method sumsquareWithin with param $rs
//     $ssw = $this->sumsquareWithin($rs);
//     //# var ssb call method sumsquareWithin with param $result_centroid
//     $ssb = $this->sumsquareBetween($result_centroid);
//     //# var ratio call method sumsquareWithin with param $rs
//     $ratio = $this->ratioDBI($ssw,$ssb);

//     //------------------------PURITY--------------------------
//     //# var Purity call method from model(collection) then change to array
//     $puritysr = Kmeans::groupingSameValueCluster()->groupBy('cluster')->toArray();
//     //dd($puritysr);
//     $purity = $this->purity($puritysr,$data);
//     //dd($purity);
//     // $test = array_count_values($purity);
    
//     //dd($test);
    
//     return view('kmeans/kmeans',compact('niup','nama_santri','nilai_t','nilai_f','nilai_h','mindistance', 'clusterall'));
// }

// public function earlyCentroid($data,$cluster){
//     // dd($data);
//     $randCentroid = [];
//     for ($i=0; $i < $cluster; $i++) { 
//         # code...
//         $temp=[2,12,23];
//         while(in_array($randCentroid, [$temp])){
//             $temp=rand(0,(count($data)-1));
//         }                        
//         $centroid[0][] = [
//             $data[$temp[$i]][0],
//             $data[$temp[$i]][1],
//             $data[$temp[$i]][2],
//         ];                           
//     }
//     return $centroid;
// }

// public function distance($data,$centroid){ 
//     // dd($centroid;
//     $resultDistance = sqrt(pow(($data[3]-$centroid[0]),2)+pow(($data[4]-$centroid[1]),2)+pow(($data[5]-$centroid[2]),2));
//     // dd($resultDistance);             
//     return $resultDistance;        
// }

// public function nearDistance($jarak_ke_centroid,$centroid){
//     foreach ($jarak_ke_centroid as $key => $value) {
//         //# check mininum distance
//         if(!isset($minimum)){
//             $minimum=$value;
           
//             $cluster=($key+1);
//             continue;
//         }
//         else if($value<$minimum){
//             $minimum=$value;
//             $cluster=($key+1);
//         }
//     }
//     return array(
//         'cluster'=>$cluster,
//         'value'=>$minimum,
//     );
// }    

// public function newCentroid($iterasi,$hasil_cluster){
//     $hasil_cluster = [];
//     //# looping for regrouping based on cluster
//     foreach ($iterasi as $key => $value) {
//         //dd($value);
//         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][0][]= $value['data'][0];
//         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][1][]= $value['data'][1];
//         $hasil_cluster[($value['jarak_terdekat']['cluster']-1)][2][]= $value['data'][2];        
//     }
//     //dd($hasil_cluster);    
//     $new_centroid = [];
//     //# looping for find new centroid in a way find average from each data
//     foreach ($hasil_cluster as $key => $value) {
//         # code...
//         $new_centroid[$key] = [
//             array_sum($value[0])/count($value[0]),
//             array_sum($value[1])/count($value[1]),
//             array_sum($value[2])/count($value[2]),
//         ];
//     }
//     //dd($new_centroid);
//     //sort based key array
//     ksort($new_centroid);
//     return $new_centroid;
// }

// public function centroidChange($centroid,$itr){
//     $centroid_lama = $this->flatten_array($centroid[($itr-1)]); //flattern array
//     //dd($centroid_lama);
//     $centroid_baru = $this->flatten_array($centroid[$itr]); //flatten array
//     //dd($centroid[$itr]);
//     //# comparing old centroid dan new centroid if change return true, if not change/value jumlah equal = 0 return false
//     $jumlah_sama=0;
//     for($i=0;$i<count($centroid_lama);$i++){
//         if($centroid_lama[$i]===$centroid_baru[$i]){
//             $jumlah_sama++;
//         }
//     }
//     //dd($jumlah_sama);
//     return $jumlah_sama===count($centroid_lama) ? false : true; 
// }

// function flatten_array($arg) {
//     //dd($arg);
//     //# find variable array then send value and then merge array
//     return is_array($arg) ? array_reduce($arg, function ($c, $a) { 
//         return array_merge($c, Arr::flatten($a)); },[]) : [$arg];
// }

// //TODO1 : Fungsi Sum Square Within (SSW)
// public function sumsquareWithin($rs){
//     //dd(count($rs));        
//     $result = 0;
//     //looping based count param
//     for ($iterate=0; $iterate < count($rs) ; $iterate++) { 
//         $result += $rs[$iterate]->average;
//     }
//     //dd($result);
//     return $result;
// }
// //TODO2 : Fungsi Sum Square Between (SSB) 
// public function sumsquareBetween($result_centroid){
//     //dd($result_centroid);        
//     $resultc1c2 = sqrt(pow(($result_centroid[0][0]-$result_centroid[1][0]),2)+pow(($result_centroid[0][1]-$result_centroid[1][1]),2)+pow(($result_centroid[0][2]-$result_centroid[1][2]),2));
//     $resultc1c3 = sqrt(pow(($result_centroid[0][0]-$result_centroid[2][0]),2)+pow(($result_centroid[0][1]-$result_centroid[2][1]),2)+pow(($result_centroid[0][2]-$result_centroid[2][2]),2));
//     $resultc2c3 = sqrt(pow(($result_centroid[1][0]-$result_centroid[2][0]),2)+pow(($result_centroid[1][1]-$result_centroid[2][1]),2)+pow(($result_centroid[1][2]-$result_centroid[2][2]),2));
//     $resultall = $resultc1c2+$resultc1c3+$resultc2c3;
//     return $resultall;        
// } 
// //TODO3 : Fungsi Ratio(Output DBI)
// public function ratioDBI($ssw,$ssb){
//     return $ssw/$ssb;
// }

// //TODO Fungsi Purity
// public function purity($puritysr,$data){
//     # code...
//     // dd($puritysr);
//     //dd($data);
//     $alldata = [];
//     //# looping based on param
//     for($i = 1 ; $i <= count($puritysr) ; $i++){
//         $alldata[$i] = count($puritysr[$i]);
//     }
//     $puritytotal = array_sum($alldata)/count($data);
//     //dd($alldata);
//     return $puritytotal;
// }