<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class polling extends Model
{
    protected $table = 'polling';

    protected $primaryKey = 'id_polling';
    public $incrementing = false;

    protected $fillable = ['id_polling', 'nama_polling', 'tanggal_mulai', 'tanggal_selesai'];
}
