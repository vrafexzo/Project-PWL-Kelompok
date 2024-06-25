<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PollingDetail extends Model
{
    use HasFactory;

    protected $table = 'polling_detail';
    protected $primaryKey = 'id_polling_detail';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function polling()
    {
        return $this->belongsTo(Polling::class, 'polling_id_polling');
    }

    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id_mk');
    }
}
