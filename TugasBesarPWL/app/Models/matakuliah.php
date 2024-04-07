<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class matakuliah extends Model
{
    protected $table = 'mata_kuliah';

    protected $primaryKey = 'id_mk';
    public $incrementing = false;

    protected $fillable = ['id_mk', 'nama_mk', 'sks', 'kurikulum_id_kurikulum'];
}
