<?php

namespace App\Models;
use App\Models\Polling;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardPostController extends Model
{
    protected $table = 'polling';

    protected $primaryKey = 'id_polling';
    public $incrementing = false;
}
