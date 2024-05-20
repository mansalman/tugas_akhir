<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cluster extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'cluster';
    protected $fillable = ['nama_cluster'];

    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id');
    }
}