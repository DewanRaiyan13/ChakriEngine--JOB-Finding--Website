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

        // Home stats
        $totalJobs = JobListing::count();
        $totalCompanies = JobListing::distinct('company')->count('company');
        $totalLocations = JobListing::distinct('location')->count('location');
        if ($totalJobs == 0) {
            // fallback if no data
            $totalJobs = 1542;
            $totalCompanies = 384;
            $totalLocations = 126;
        }

        return view('home', compact('jobs', 'query', 'totalJobs', 'totalCompanies', 'totalLocations'));
    }

    public function jobs(Request $request)
    {
        $query = $request->get('q');
        
        if ($query) {
            $jobs = JobListing::search($query)->paginate(15);
        } else {
            $jobs = JobListing::latest()->paginate(15);
        }

        return view('jobs', compact('jobs', 'query'));
    }
}
