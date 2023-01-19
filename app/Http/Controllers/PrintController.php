<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class PrintController extends Controller
{
    public function index()
      {
            $students = Addresses::all();
            return view('printstudent')->with('students', $students);;
      }
      public function prnpriview()
      {
            $students = Addresses::all();
            return view('students')->with('students', $students);;
      }
}
