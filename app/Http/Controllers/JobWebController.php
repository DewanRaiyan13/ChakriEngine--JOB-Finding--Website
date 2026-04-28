<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobWebController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q');
        
        if ($query) {
            $jobs = JobListing::search($query)->paginate(12);
        } else {
            $jobs = JobListing::latest()->paginate(12);
        }

        return view('welcome', compact('jobs', 'query'));
    }
}
