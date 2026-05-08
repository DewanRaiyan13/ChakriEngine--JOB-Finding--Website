@extends('layouts.app')
@section('title', 'About | ChakriEngine')

@section('styles')
<style>
    .about-hero { padding: 5rem 2rem; text-align: center; max-width: 800px; margin: 0 auto; }
    .about-hero h1 { font-size: 2.8rem; font-weight: 800; margin-bottom: 1.2rem; }
    .about-hero p { color: var(--text-muted); font-size: 1.15rem; line-height: 1.8; }

    .about-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 2rem; margin: 3rem 0; }
    .about-card { padding: 2.5rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: var(--radius-lg); transition: var(--transition); }
    .about-card:hover { border-color: var(--glass-border-hover); transform: translateY(-4px); }
    .about-card .icon { font-size: 2.5rem; margin-bottom: 1.2rem; display: block; }
    .about-card h3 { font-size: 1.2rem; font-weight: 600; margin-bottom: 0.7rem; }
    .about-card p { color: var(--text-muted); font-size: 0.95rem; line-height: 1.7; }

    .tech-stack { padding: 4rem 0; text-align: center; }
    .tech-stack h2 { font-size: 1.8rem; font-weight: 700; margin-bottom: 2rem; }
    .tech-list { display: flex; justify-content: center; gap: 1rem; flex-wrap: wrap; }
    .tech-item { padding: 0.8rem 1.5rem; background: var(--card-bg); border: 1px solid var(--glass-border); border-radius: 3rem; color: var(--text-muted); font-weight: 500; transition: var(--transition); }
    .tech-item:hover { border-color: var(--primary); color: var(--primary-light); }

    @media (max-width: 768px) { .about-grid { grid-template-columns: 1fr; } }
</style>
@endsection

@section('content')
<div class="container">
    <section class="about-hero">
        <h1>About <span class="gradient-text">ChakriEngine</span></h1>
        <p>ChakriEngine is an automated job aggregation platform built with Laravel 12. We scrape multiple job APIs and boards in real-time, so job seekers never miss an opportunity. Our mission: make job hunting effortless.</p>
    </section>

    <div class="about-grid">
        <div class="about-card"><span class="icon">🔄</span><h3>Automated Aggregation</h3><p>Our scheduled Laravel commands fetch jobs from Adzuna and other APIs every hour, ensuring the freshest listings are always available.</p></div>
        <div class="about-card"><span class="icon">🧠</span><h3>Smart Search</h3><p>Powered by Laravel Scout, our full-text search understands context and delivers relevant results across title, company, and description fields.</p></div>
        <div class="about-card"><span class="icon">🛡️</span><h3>Secure API</h3><p>Rate-limited REST API with optional Sanctum authentication. Build your own tools, bots, or dashboards on top of our data.</p></div>
        <div class="about-card"><span class="icon">⚡</span><h3>Blazing Fast</h3><p>Multi-layer caching strategy ensures sub-100ms response times. SQLite for simplicity, Redis-ready for scale.</p></div>
    </div>

    <section class="tech-stack">
        <h2>Built With <span class="gradient-text">Modern Tech</span></h2>
        <div class="tech-list">
            <span class="tech-item">Laravel 12</span>
            <span class="tech-item">PHP 8.2</span>
            <span class="tech-item">Laravel Scout</span>
            <span class="tech-item">Sanctum</span>
            <span class="tech-item">Vite</span>
            <span class="tech-item">SQLite</span>
            <span class="tech-item">Adzuna API</span>
            <span class="tech-item">Tailwind CSS</span>
        </div>
    </section>
</div>
@endsection
