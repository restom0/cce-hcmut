<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ketqua extends Model
{
    use HasFactory;
    protected $table = 'ketqua';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    public function Sinhvien()
    {
        return $this->belongsTo(Sinhvien::class, 'Masv', 'Id');
    }
    public function Monhoc()
    {
        return $this->belongsTo(Monhoc::class, 'Mamh', 'Id');
    }
}
