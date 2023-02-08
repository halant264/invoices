<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Addresses;

class PrintController extends Controller
{
    public function index()
      {
            
            return view('printstudent');
      }
      public function prnpriview()
      {
            
            return view('students');
      }
}
