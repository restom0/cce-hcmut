<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lophoc extends Model
{
    use HasFactory;
    protected $table = 'lophoc';
    protected $primaryKey = 'Malop';
    public $timestamps = false;
    public function Khoa()
    {
        return $this->belongsTo(Khoa::class, 'Makh', 'makh');
    }
}
