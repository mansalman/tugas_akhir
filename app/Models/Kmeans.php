<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kmeans extends Model
{
    protected $table = 'cluster'; // Menentukan nama tabel yang sesuai
    protected $primaryKey = 'id'; // Menentukan primary key
    
    // Tentukan kolom-kolom yang dapat diisi
    protected $fillable = [
        'nama_cluster',
    ];

    // Tambahan metode atau hubungan model, jika diperlukan
}