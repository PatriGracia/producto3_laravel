<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acto extends Model
{
    use HasFactory;

    protected $table = "Actos";
    protected $primaryKey = 'Id_acto';
    public $timestamps = false;
}