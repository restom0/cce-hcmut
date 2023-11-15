<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Khoa extends Model
{
    use HasFactory;
    protected $table = 'khoa';
    protected $primaryKey = 'makh';
    public $timestamps = false;
    public function lophoc()
    {
        return $this->hasMany(Lophoc::class, 'Makh', 'makh');
    }
}
