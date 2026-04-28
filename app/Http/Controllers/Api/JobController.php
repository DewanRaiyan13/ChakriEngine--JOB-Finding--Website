<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\JobListing;
use App\Http\Resources\JobResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JobController extends Controller
{
    public function index()
    {
        // $jobs = Cache::remember('jobs.all.' . request('page', 1), 600, function () {
        //    return JobListing::latest()->paginate(15);
        // });
        // Wait, Pagination with cache requires caching per page
        
        $page = request()->get('page', 1);
        $jobs = Cache::remember("jobs.all.page.{$page}", 600, function () {
            return JobListing::latest()->paginate(15);
        });

        return JobResource::collection($jobs);
    }

    public function search(Request $request)
    {
        $query = $request->get('q');
        $page = $request->get('page', 1);
        
        if (!$query) {
            return response()->json(['message' => 'Search query (q) is required.'], 400);
        }

        $jobs = Cache::remember("jobs.search.{$query}.page.{$page}", 600, function () use ($query) {
            // Using Laravel Scout
            return JobListing::search($query)->paginate(15);
        });

        return JobResource::collection($jobs);
    }
}
