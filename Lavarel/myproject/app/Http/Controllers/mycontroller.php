<?php

namespace App\Http\Controllers;

use App\Models\Monhoc;
use Illuminate\Http\Request;

class mycontroller extends Controller
{
    public function display_all_subjects()
    {
        $subjects = Monhoc::all();
        $total = Monhoc::all()->count();
        return view("Buoi07.list_subjects", compact("subjects", "total"));
    }
}
