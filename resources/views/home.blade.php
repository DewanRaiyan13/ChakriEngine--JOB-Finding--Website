@extends('layouts.app')
@section('title', 'ChakriEngine | Find Your Dream Job')
@section('meta_description', 'ChakriEngine aggregates thousands of tech jobs. AI-powered search, real-time updates.')

@section('styles')
<style>
    .hero { padding: 6rem 2rem 4rem; text-align: center; max-width: 900px; margin: 0 auto; }
    .hero h1 { font-size: clamp(2.5rem, 6vw, 4rem); font-weight: 800; margin-bottom: 1.5rem; line-height: 1.08; letter-spacing: -1px; }
    .hero p { color: var(--text-muted); font-size: 1.2rem; margin-bottom: 3rem; max-width: 600px; margin-left: auto; margin-right: auto; }
    .hero-highlight { position: relative; }
    .hero-highlight::after { content: ''; position: absolute; bottom: 2px; left: 0; right: 0; height: 12px; background: linear-gradient(90deg, var(--primary), var(--secondary)); opacity: 0.3; border-radius: 4px; z-index: -1; }

    .search-box { max-width: 680px; margin: 0 auto 2rem; position: relative; }
    .search-box form { display: flex; gap: 0; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); overflow: hidden; transition: var(--transition); }
    .search-box form:focus-within { border-color: var(--primary); box-shadow: 0 0 30px rgba(99,102,241,0.2); }
    .search-box input { flex: 1; padding: 1.2rem 1.5rem; background: transparent; border: none; color: var(--text); font-size: 1.05rem; font-family: 'Outfit', sans-serif; outline: none; }
    .search-box input::placeholder { color: var(--text-dim); }
    .search-box button { padding: 1rem 2rem; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; border: none; font-family: 'Outfit', sans-serif; font-weight: 600; font-size: 1rem; cursor: pointer; transition: var(--transition); display: flex; align-items: center; gap: 0.5rem; }
    .search-box button:hover { background: linear-gradient(135deg, var(--primary-dark), #4338ca); }

    .search-tags { display: flex; justify-content: center; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 4rem; }
    .search-tags a { padding: 0.4rem 1rem; border-radius: 2rem; background: var(--glass); border: 1px solid var(--glass-border); color: var(--text-muted); text-decoration: none; font-size: 0.85rem; transition: var(--transition); }
    .search-tags a:hover { border-color: var(--primary); color: var(--primary-light); background: rgba(99,102,241,0.08); }

    .stats-bar { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1.5rem; max-width: 900px; margin: 0 auto 5rem; }
    .stat-item { text-align: center; padding: 2rem 1rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); transition: var(--transition); }
    .stat-item:hover { border-color: var(--glass-border-hover); transform: translateY(-4px); }
    .stat-number { font-size: 2.2rem; font-weight: 800; margin-bottom: 0.3rem; }
    .stat-label { color: var(--text-muted); font-size: 0.85rem; text-transform: uppercase; letter-spacing: 1px; }

    .section { padding: 4rem 0; }
    .section-header { text-align: center; margin-bottom: 3rem; }
    .section-header h2 { font-size: 2rem; font-weight: 700; margin-bottom: 0.75rem; }
    .section-header p { color: var(--text-muted); font-size: 1.05rem; }

    .categories-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 1rem; }
    .category-card { padding: 1.8rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); text-decoration: none; color: var(--text); transition: var(--transition); text-align: center; }
    .category-card:hover { border-color: var(--primary); transform: translateY(-6px); box-shadow: 0 12px 40px rgba(0,0,0,0.3); }
    .category-icon { font-size: 2.5rem; margin-bottom: 1rem; display: block; }
    .category-card h3 { font-size: 1rem; font-weight: 600; margin-bottom: 0.3rem; }
    .category-card span { color: var(--text-muted); font-size: 0.85rem; }

    .job-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(380px, 1fr)); gap: 1.5rem; }
    .job-card { background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); padding: 1.8rem; display: flex; flex-direction: column; justify-content: space-between; transition: var(--transition); }
    .job-card:hover { border-color: var(--primary); transform: translateY(-6px); box-shadow: var(--shadow-lg); }
    .job-card-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 1rem; }
    .company-name { color: var(--primary-light); font-weight: 600; font-size: 0.9rem; }
    .job-title { font-size: 1.25rem; font-weight: 700; margin-bottom: 0.75rem; line-height: 1.3; }
    .job-meta { display: flex; gap: 1rem; color: var(--text-muted); font-size: 0.85rem; margin-bottom: 1.2rem; flex-wrap: wrap; }
    .job-meta span { display: flex; align-items: center; gap: 0.3rem; }
    .job-desc { color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; margin-bottom: 1.5rem; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
    .job-footer { display: flex; justify-content: space-between; align-items: center; }
    .job-footer a { text-decoration: none; }

    .cta-section { padding: 5rem 2rem; text-align: center; margin: 3rem 0; background: linear-gradient(135deg, rgba(99,102,241,0.08), rgba(236,72,153,0.08)); border-radius: var(--radius-xl); border: 1px solid var(--glass-border); }
    .cta-section h2 { font-size: 2.2rem; font-weight: 700; margin-bottom: 1rem; }
    .cta-section p { color: var(--text-muted); margin-bottom: 2rem; font-size: 1.1rem; }
    .cta-buttons { display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; }

    .features-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.5rem; }
    .feature-card { padding: 2.5rem 2rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); transition: var(--transition); }
    .feature-card:hover { border-color: var(--glass-border-hover); transform: translateY(-4px); }
    .feature-icon { width: 56px; height: 56px; border-radius: 14px; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; margin-bottom: 1.5rem; }
    .feature-card h3 { font-size: 1.15rem; font-weight: 600; margin-bottom: 0.6rem; }
    .feature-card p { color: var(--text-muted); font-size: 0.9rem; line-height: 1.6; }

    .view-all { text-align: center; margin-top: 2.5rem; }

    @media (max-width: 768px) {
        .stats-bar { grid-template-columns: repeat(2, 1fr); }
        .features-grid { grid-template-columns: 1fr; }
        .job-grid { grid-template-columns: 1fr; }
        .categories-grid { grid-template-columns: repeat(2, 1fr); }
    }
</style>
@endsection

@section('content')
<section class="hero">
    <h1 class="animate-fade-in-up">Find Your Next <span class="hero-highlight gradient-text">Dream Job</span> Today</h1>
    <p class="animate-fade-in-up animate-delay-1">ChakriEngine aggregates thousands of tech jobs from across the web. AI-powered search. Real-time updates. Zero hassle.</p>
    <div class="search-box animate-fade-in-up animate-delay-2">
        <form action="/jobs" method="GET">
            <input type="text" name="q" placeholder="Search by job title, company, or skill..." value="{{ $query ?? '' }}" id="heroSearch">
            <button type="submit">🔍 Search</button>
        </form>
    </div>
    <div class="search-tags animate-fade-in-up animate-delay-3">
        <a href="/jobs?q=Laravel">Laravel</a>
        <a href="/jobs?q=React">React</a>
        <a href="/jobs?q=Python">Python</a>
        <a href="/jobs?q=Remote">Remote</a>
        <a href="/jobs?q=Full Stack">Full Stack</a>
        <a href="/jobs?q=DevOps">DevOps</a>
    </div>
</section>

<div class="container">
    <div class="stats-bar">
        <div class="stat-item animate-fade-in-up">
            <div class="stat-number gradient-text">{{ number_format($totalJobs) }}+</div>
            <div class="stat-label">Jobs Listed</div>
        </div>
        <div class="stat-item animate-fade-in-up animate-delay-1">
            <div class="stat-number gradient-text">{{ $totalCompanies }}+</div>
            <div class="stat-label">Companies</div>
        </div>
        <div class="stat-item animate-fade-in-up animate-delay-2">
            <div class="stat-number gradient-text">{{ $totalLocations }}+</div>
            <div class="stat-label">Locations</div>
        </div>
        <div class="stat-item animate-fade-in-up animate-delay-3">
            <div class="stat-number gradient-text">24/7</div>
            <div class="stat-label">Auto Updates</div>
        </div>
    </div>

    <!-- Categories -->
    <section class="section">
        <div class="section-header">
            <h2>Explore by <span class="gradient-text">Category</span></h2>
            <p>Browse jobs across popular tech domains</p>
        </div>
        <div class="categories-grid">
            <a href="/jobs?q=Frontend" class="category-card"><span class="category-icon">🎨</span><h3>Frontend</h3><span>UI/UX & Web</span></a>
            <a href="/jobs?q=Backend" class="category-card"><span class="category-icon">⚙️</span><h3>Backend</h3><span>APIs & Servers</span></a>
            <a href="/jobs?q=Mobile" class="category-card"><span class="category-icon">📱</span><h3>Mobile</h3><span>iOS & Android</span></a>
            <a href="/jobs?q=DevOps" class="category-card"><span class="category-icon">☁️</span><h3>DevOps</h3><span>Cloud & Infra</span></a>
            <a href="/jobs?q=Data Science" class="category-card"><span class="category-icon">📊</span><h3>Data Science</h3><span>ML & Analytics</span></a>
            <a href="/jobs?q=Design" class="category-card"><span class="category-icon">✏️</span><h3>Design</h3><span>UI/UX Design</span></a>
        </div>
    </section>

    <!-- Latest Jobs -->
    <section class="section">
        <div class="section-header">
            <h2>Latest <span class="gradient-text">Opportunities</span></h2>
            <p>Freshly aggregated from top job boards</p>
        </div>
        @if($jobs->isEmpty())
            <div style="text-align:center; padding:4rem 2rem; background:var(--card-bg); border-radius:var(--radius-xl); border:2px dashed var(--glass-border);">
                <p style="font-size:3rem; margin-bottom:1rem;">🔍</p>
                <h3 style="margin-bottom:0.5rem;">No jobs found yet</h3>
                <p style="color:var(--text-muted);">Our bots are crawling for opportunities. Check back soon!</p>
            </div>
        @else
            <div class="job-grid">
                @foreach($jobs->take(6) as $job)
                <div class="job-card">
                    <div>
                        <div class="job-card-header">
                            <span class="company-name">{{ $job->company }}</span>
                            <span class="badge badge-primary">New</span>
                        </div>
                        <h3 class="job-title">{{ $job->title }}</h3>
                        <div class="job-meta">
                            <span>📍 {{ $job->location }}</span>
                            @if($job->salary)<span>💰 {{ $job->salary }}</span>@endif
                            <span>🕐 {{ $job->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="job-desc">{{ strip_tags($job->description) }}</p>
                    </div>
                    <div class="job-footer">
                        @if($job->source)<span class="badge badge-accent">{{ $job->source }}</span>@endif
                        <a href="{{ $job->url }}" target="_blank" class="btn btn-ghost" style="padding:0.6rem 1.2rem; font-size:0.85rem;">View Job →</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="view-all"><a href="/jobs" class="btn btn-secondary">Browse All Jobs →</a></div>
        @endif
    </section>

    <!-- Features -->
    <section class="section">
        <div class="section-header">
            <h2>Why <span class="gradient-text">ChakriEngine</span>?</h2>
            <p>Built for developers, by developers</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(99,102,241,0.12);">🤖</div>
                <h3>AI-Powered Search</h3>
                <p>Laravel Scout integration provides intelligent full-text search across all job listings.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(16,185,129,0.12);">⚡</div>
                <h3>Real-Time Aggregation</h3>
                <p>Automated bots crawl Adzuna and other APIs every hour for fresh opportunities.</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon" style="background:rgba(236,72,153,0.12);">🔌</div>
                <h3>REST API Access</h3>
                <p>Full API with rate limiting and Sanctum auth. Build your own job tools on top.</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <h2>Ready to Find Your Next Role?</h2>
        <p>Start exploring thousands of curated tech jobs right now.</p>
        <div class="cta-buttons">
            <a href="/jobs" class="btn btn-primary">🚀 Browse Jobs</a>
            <a href="/api/jobs" target="_blank" class="btn btn-secondary">📖 Explore API</a>
        </div>
    </section>
</div>
@endsection
