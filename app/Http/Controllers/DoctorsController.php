<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    //
    public function index() {
        // Show all doctors in the database
        $doctors = User::with('major')->where('role','doctor')->paginate(12);
        return view('front.doctors.doctors', compact('doctors'));
    }
}
