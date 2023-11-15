<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinhvien extends Model
{
    use HasFactory;
    protected $table = 'sinhvien';
    protected $primaryKey = 'Masv';
    public $timestamps = false;
    public function Lophoc()
    {
        return $this->belongsTo(Lophoc::class, 'Malop', 'Malop');
    }
    public function Ketqua()
    {
        return $this->hasMany(Ketqua::class, 'Masv', 'Masv');
    }
}
