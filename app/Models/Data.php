<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'data';
    protected $fillable = ['niup', 'nama_santri', 'wilayah', 'daerah', 'lembaga', 'nilai_t', 'nilai_f', 'nilai_h'];
}