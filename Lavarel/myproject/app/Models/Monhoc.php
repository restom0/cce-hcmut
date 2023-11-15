<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    protected $table = "monhoc";
    protected $primaryKey = "mamh";
    public $timestamps = false;
    use HasFactory;
}
