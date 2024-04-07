<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kuri extends Model
{
    protected $table = 'kurikulum';

    protected $primaryKey = 'id_kurikulum';
    public $incrementing = false;

    protected $fillable = ['id_kurikulum', 'nama_kurikulum'];
}
