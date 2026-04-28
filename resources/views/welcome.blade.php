<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ChakriEngine | Find Your Dream Tech Job</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --bg: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text: #f8fafc;
            --text-muted: #94a3b8;
            --glass: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg);
            background-image: 
                radial-gradient(at 0% 0%, rgba(99, 102, 241, 0.15) 0px, transparent 50%),
                radial-gradient(at 100% 100%, rgba(236, 72, 153, 0.15) 0px, transparent 50%);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        header {
            padding: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            backdrop-filter: blur(10px);
            position: sticky;
            top: 0;
            z-index: 100;
            border-bottom: 1px solid var(--glass-border);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(to right, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .hero {
            padding: 6rem 2rem 4rem;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.1;
        }

        .hero p {
            color: var(--text-muted);
            font-size: 1.2rem;
            margin-bottom: 3rem;
        }

        .search-container {
            position: relative;
            max-width: 600px;
            margin: 0 auto;
        }

        .search-input {
            width: 100%;
            padding: 1.2rem 1.5rem;
            padding-right: 4rem;
            border-radius: 1rem;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            color: white;
            font-size: 1.1rem;
            outline: none;
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .search-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 20px rgba(99, 102, 241, 0.3);
        }

        .search-btn {
            position: absolute;
            right: 0.5rem;
            top: 0.5rem;
            bottom: 0.5rem;
            width: 3rem;
            background: var(--primary);
            border: none;
            border-radius: 0.75rem;
            color: white;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: var(--primary-dark);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 400;
        }

        .job-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 1.5rem;
        }

        .job-card {
            background: var(--card-bg);
            border-radius: 1.5rem;
            padding: 2rem;
            border: 1px solid var(--glass-border);
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .job-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border-color: var(--primary);
        }

        .job-title {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: var(--text);
        }

        .company-name {
            color: var(--primary);
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
        }

        .job-meta {
            display: flex;
            gap: 1rem;
            color: var(--text-muted);
            font-size: 0.9rem;
            margin-bottom: 1.5rem;
        }

        .job-meta span {
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .job-description {
            color: var(--text-muted);
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .apply-btn {
            padding: 1rem;
            background: transparent;
            border: 1px solid var(--glass-border);
            border-radius: 1rem;
            color: var(--text);
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s;
        }

        .apply-btn:hover {
            background: var(--primary);
            border-color: var(--primary);
        }

        .empty-state {
            text-align: center;
            padding: 4rem;
            background: var(--card-bg);
            border-radius: 2rem;
            border: 2px dashed var(--glass-border);
        }

        .pagination {
            margin-top: 4rem;
            display: flex;
            justify-content: center;
            gap: 1rem;
        }

        .pagination-link {
            padding: 0.8rem 1.2rem;
            border-radius: 0.8rem;
            background: var(--glass);
            color: var(--text);
            text-decoration: none;
            border: 1px solid var(--glass-border);
        }

        .pagination-link.active {
            background: var(--primary);
            border-color: var(--primary);
        }

        footer {
            padding: 4rem 2rem;
            text-align: center;
            color: var(--text-muted);
            border-top: 1px solid var(--glass-border);
            margin-top: 4rem;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">ChakriEngine</div>
        <nav>
            <a href="/api/jobs" target="_blank" style="color: var(--text-muted); text-decoration: none; font-weight: 600;">API Documentation</a>
        </nav>
    </header>

    <section class="hero">
        <h1>Your Future in <span style="color: var(--primary)">Tech</span> Starts Here.</h1>
        <p>The most advanced job aggregator for developers. We scrape the web so you don't have to. Real-time updates, AI-ready search.</p>
        
        <div class="search-container">
            <form action="/" method="GET">
                <input type="text" name="q" class="search-input" placeholder="Search by job title, company, or skills..." value="{{ $query ?? '' }}">
                <button type="submit" class="search-btn">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                </button>
            </form>
        </div>
    </section>

    <main class="container">
        <h2 class="section-title">
            {{ $query ? "Search Results for '$query'" : "Recently Added Jobs" }}
        </h2>

        @if($jobs->isEmpty())
            <div class="empty-state">
                <h3>No jobs found matching your criteria.</h3>
                <p>Try searching for something else or check back later! Our bots are currently crawling for new opportunities.</p>
            </div>
        @else
            <div class="job-grid">
                @foreach($jobs as $job)
                    <div class="job-card">
                        <div>
                            <span class="company-name">{{ $job->company }}</span>
                            <h3 class="job-title">{{ $job->title }}</h3>
                            <div class="job-meta">
                                <span>📍 {{ $job->location }}</span>
                                @if($job->salary)
                                    <span>💰 {{ $job->salary }}</span>
                                @endif
                                <span>📅 {{ $job->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="job-description">
                                {{ strip_tags($job->description) }}
                            </p>
                        </div>
                        <a href="{{ $job->url }}" target="_blank" class="apply-btn">View Details</a>
                    </div>
                @endforeach
            </div>

            <div class="pagination">
                {{ $jobs->appends(['q' => $query])->links() }}
            </div>
        @endif
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} ChakriEngine. Built with Laravel 12, Scout & Love.</p>
    </footer>
</body>
</html>
