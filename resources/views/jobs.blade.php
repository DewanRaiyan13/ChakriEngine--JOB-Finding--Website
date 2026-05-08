@extends('layouts.app')
@section('title', 'Browse Jobs | ChakriEngine')
@section('meta_description', 'Browse thousands of tech jobs. Filter by keyword, location, and company.')

@section('styles')
<style>
    .page-header { padding: 3rem 0 2rem; }
    .page-header h1 { font-size: 2.2rem; font-weight: 700; margin-bottom: 0.5rem; }
    .page-header p { color: var(--text-muted); }

    .filters-bar { display: flex; gap: 1rem; margin-bottom: 2rem; flex-wrap: wrap; align-items: center; }
    .filter-input { flex: 1; min-width: 250px; padding: 0.9rem 1.2rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius); color: var(--text); font-family: 'Outfit', sans-serif; font-size: 0.95rem; outline: none; transition: var(--transition); }
    .filter-input:focus { border-color: var(--primary); box-shadow: 0 0 20px rgba(99,102,241,0.15); }
    .filter-input::placeholder { color: var(--text-dim); }
    .filter-select { padding: 0.9rem 1.2rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius); color: var(--text); font-family: 'Outfit', sans-serif; font-size: 0.95rem; outline: none; cursor: pointer; appearance: none; min-width: 160px; }
    .filter-select option { background: var(--bg-secondary); }

    .results-info { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; color: var(--text-muted); font-size: 0.9rem; }

    .job-list { display: flex; flex-direction: column; gap: 1rem; }
    .job-list-item { display: flex; gap: 1.5rem; padding: 1.5rem 2rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); transition: var(--transition); align-items: center; }
    .job-list-item:hover { border-color: var(--primary); transform: translateX(4px); box-shadow: var(--shadow); }
    .job-list-icon { width: 56px; height: 56px; border-radius: 14px; background: linear-gradient(135deg, rgba(99,102,241,0.12), rgba(236,72,153,0.08)); display: flex; align-items: center; justify-content: center; font-size: 1.5rem; flex-shrink: 0; }
    .job-list-body { flex: 1; min-width: 0; }
    .job-list-body .company { color: var(--primary-light); font-weight: 600; font-size: 0.85rem; margin-bottom: 0.2rem; }
    .job-list-body h3 { font-size: 1.15rem; font-weight: 600; margin-bottom: 0.5rem; }
    .job-list-body .meta { display: flex; gap: 1rem; color: var(--text-muted); font-size: 0.8rem; flex-wrap: wrap; }
    .job-list-body .meta span { display: flex; align-items: center; gap: 0.3rem; }
    .job-list-actions { display: flex; flex-direction: column; align-items: flex-end; gap: 0.5rem; flex-shrink: 0; }
    .job-list-actions .time { color: var(--text-dim); font-size: 0.8rem; white-space: nowrap; }

    .pagination-wrapper { display: flex; justify-content: center; margin: 3rem 0; }
    .pagination-wrapper nav { display: flex; gap: 0.5rem; align-items: center; }
    .pagination-wrapper .page-link, .pagination-wrapper span.page-link { padding: 0.6rem 1rem; border-radius: 0.6rem; background: var(--glass); color: var(--text-muted); text-decoration: none; border: 1px solid var(--glass-border); font-size: 0.9rem; transition: var(--transition); }
    .pagination-wrapper .page-item.active .page-link { background: var(--primary); border-color: var(--primary); color: white; }
    .pagination-wrapper .page-link:hover { background: rgba(99,102,241,0.15); border-color: var(--primary); color: var(--text); }

    .empty-state { text-align: center; padding: 5rem 2rem; background: var(--card-bg); border-radius: var(--radius-xl); border: 2px dashed var(--glass-border); }
    .empty-state h3 { margin: 1rem 0 0.5rem; font-size: 1.3rem; }
    .empty-state p { color: var(--text-muted); }

    @media (max-width: 768px) {
        .job-list-item { flex-direction: column; align-items: flex-start; }
        .job-list-actions { flex-direction: row; width: 100%; justify-content: space-between; }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="page-header">
        <h1>@if($query) Results for "<span class="gradient-text">{{ $query }}</span>" @else Browse <span class="gradient-text">All Jobs</span> @endif</h1>
        <p>{{ $jobs->total() }} opportunities found</p>
    </div>

    <form action="/jobs" method="GET">
        <div class="filters-bar">
            <input type="text" name="q" class="filter-input" placeholder="Search jobs, companies, skills..." value="{{ $query ?? '' }}">
            <button type="submit" class="btn btn-primary" style="padding:0.9rem 1.5rem;">🔍 Search</button>
        </div>
    </form>

    @if($jobs->isEmpty())
        <div class="empty-state">
            <p style="font-size:3.5rem;">🔍</p>
            <h3>No jobs match your search</h3>
            <p>Try different keywords or <a href="/jobs" style="color:var(--primary-light);">browse all jobs</a></p>
        </div>
    @else
        <div class="job-list">
            @foreach($jobs as $job)
            <div class="job-list-item">
                <div class="job-list-icon">💼</div>
                <div class="job-list-body">
                    <div class="company">{{ $job->company }}</div>
                    <h3>{{ $job->title }}</h3>
                    <div class="meta">
                        <span>📍 {{ $job->location }}</span>
                        @if($job->salary)<span>💰 {{ $job->salary }}</span>@endif
                        @if($job->source)<span>🔗 {{ $job->source }}</span>@endif
                    </div>
                </div>
                <div class="job-list-actions">
                    <a href="{{ $job->url }}" target="_blank" class="btn btn-ghost" style="padding:0.5rem 1rem; font-size:0.85rem;">Apply →</a>
                    <span class="time">{{ $job->created_at->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pagination-wrapper">{{ $jobs->appends(['q' => $query])->links() }}</div>
    @endif
</div>
@endsection
