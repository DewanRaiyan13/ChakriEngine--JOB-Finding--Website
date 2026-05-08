<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'ChakriEngine - The smartest job aggregator platform. Find your dream tech job with AI-powered search across thousands of listings.')">
    <title>@yield('title', 'ChakriEngine | Find Your Dream Job')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        /* ========== RESET & VARIABLES ========== */
        :root {
            --primary: #6366f1;
            --primary-light: #818cf8;
            --primary-dark: #4f46e5;
            --secondary: #ec4899;
            --secondary-light: #f472b6;
            --accent: #06b6d4;
            --accent-light: #22d3ee;
            --success: #10b981;
            --warning: #f59e0b;
            --bg: #f8fafc;
            --bg-secondary: #f1f5f9;
            --card-bg: rgba(255, 255, 255, 0.9);
            --card-bg-hover: rgba(255, 255, 255, 1);
            --text: #0f172a;
            --text-muted: #475569;
            --text-dim: #64748b;
            --glass: rgba(0, 0, 0, 0.03);
            --glass-border: rgba(0, 0, 0, 0.08);
            --glass-border-hover: rgba(0, 0, 0, 0.15);
            --radius: 1rem;
            --radius-lg: 1.5rem;
            --radius-xl: 2rem;
            --shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.5);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* ========== ANIMATED BACKGROUND ========== */
        .bg-glow {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            z-index: 0;
            background:
                radial-gradient(ellipse 80% 50% at 20% 10%, rgba(99, 102, 241, 0.12) 0%, transparent 60%),
                radial-gradient(ellipse 60% 40% at 80% 90%, rgba(236, 72, 153, 0.1) 0%, transparent 60%),
                radial-gradient(ellipse 50% 30% at 50% 50%, rgba(6, 182, 212, 0.06) 0%, transparent 60%);
            animation: bgPulse 8s ease-in-out infinite alternate;
        }

        @keyframes bgPulse {
            0% { opacity: 0.8; }
            100% { opacity: 1.2; }
        }

        /* ========== NOISE TEXTURE ========== */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.03'/%3E%3C/svg%3E");
            pointer-events: none;
            z-index: 0;
        }

        /* ========== HEADER / NAV ========== */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0 2rem;
            backdrop-filter: blur(20px) saturate(180%);
            -webkit-backdrop-filter: blur(20px) saturate(180%);
            background: rgba(255, 255, 255, 0.75);
            border-bottom: 1px solid var(--glass-border);
        }

        .navbar-inner {
            max-width: 1280px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 72px;
        }

        .logo {
            font-size: 1.6rem;
            font-weight: 800;
            text-decoration: none;
            background: linear-gradient(135deg, var(--primary-light), var(--secondary), var(--accent));
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradientShift 4s ease infinite;
            letter-spacing: -0.5px;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            list-style: none;
        }

        .nav-links a {
            color: var(--text-muted);
            text-decoration: none;
            padding: 0.6rem 1.2rem;
            border-radius: 0.75rem;
            font-weight: 500;
            font-size: 0.95rem;
            transition: var(--transition);
            position: relative;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--text);
            background: rgba(99, 102, 241, 0.1);
        }

        .nav-links a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 20px;
            height: 2px;
            background: var(--primary);
            border-radius: 1px;
        }

        .nav-cta {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark)) !important;
            color: white !important;
            font-weight: 600 !important;
            border: none;
            cursor: pointer;
        }

        .nav-cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.4);
        }

        /* Mobile Menu */
        .menu-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text);
            cursor: pointer;
            padding: 0.5rem;
        }

        .menu-toggle span {
            display: block;
            width: 24px;
            height: 2px;
            background: var(--text);
            margin: 5px 0;
            transition: var(--transition);
            border-radius: 2px;
        }

        /* ========== MAIN CONTENT ========== */
        .main-content {
            position: relative;
            z-index: 1;
            min-height: calc(100vh - 72px - 300px);
        }

        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* ========== FOOTER ========== */
        .site-footer {
            position: relative;
            z-index: 1;
            border-top: 1px solid var(--glass-border);
            background: rgba(248, 250, 252, 0.9);
            backdrop-filter: blur(10px);
        }

        .footer-inner {
            max-width: 1280px;
            margin: 0 auto;
            padding: 4rem 2rem 2rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand .logo {
            display: inline-block;
            margin-bottom: 1rem;
        }

        .footer-brand p {
            color: var(--text-muted);
            font-size: 0.9rem;
            line-height: 1.7;
            max-width: 300px;
        }

        .footer-col h4 {
            color: var(--text);
            font-weight: 600;
            margin-bottom: 1.2rem;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .footer-col ul {
            list-style: none;
        }

        .footer-col ul li {
            margin-bottom: 0.6rem;
        }

        .footer-col ul a {
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        .footer-col ul a:hover {
            color: var(--primary-light);
            padding-left: 4px;
        }

        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 2rem;
            border-top: 1px solid var(--glass-border);
            color: var(--text-dim);
            font-size: 0.85rem;
        }

        .footer-socials {
            display: flex;
            gap: 1rem;
        }

        .footer-socials a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--glass);
            border: 1px solid var(--glass-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-muted);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.85rem;
        }

        .footer-socials a:hover {
            background: var(--primary);
            border-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* ========== UTILITY CLASSES ========== */
        .gradient-text {
            background: linear-gradient(135deg, var(--primary-light), var(--secondary));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            padding: 0.3rem 0.8rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-primary {
            background: rgba(99, 102, 241, 0.15);
            color: var(--primary-light);
            border: 1px solid rgba(99, 102, 241, 0.25);
        }

        .badge-success {
            background: rgba(16, 185, 129, 0.15);
            color: var(--success);
            border: 1px solid rgba(16, 185, 129, 0.25);
        }

        .badge-warning {
            background: rgba(245, 158, 11, 0.15);
            color: var(--warning);
            border: 1px solid rgba(245, 158, 11, 0.25);
        }

        .badge-accent {
            background: rgba(6, 182, 212, 0.15);
            color: var(--accent-light);
            border: 1px solid rgba(6, 182, 212, 0.25);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.85rem 1.8rem;
            border-radius: var(--radius);
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            white-space: nowrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(99, 102, 241, 0.5);
        }

        .btn-secondary {
            background: var(--glass);
            color: var(--text);
            border: 1px solid var(--glass-border);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.08);
            border-color: var(--glass-border-hover);
            transform: translateY(-2px);
        }

        .btn-ghost {
            background: transparent;
            color: var(--primary-light);
            border: 1px solid var(--primary);
        }

        .btn-ghost:hover {
            background: rgba(99, 102, 241, 0.1);
            transform: translateY(-2px);
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animate-delay-1 { animation-delay: 0.1s; }
        .animate-delay-2 { animation-delay: 0.2s; }
        .animate-delay-3 { animation-delay: 0.3s; }
        .animate-delay-4 { animation-delay: 0.4s; }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 1024px) {
            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 1rem;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                position: fixed;
                top: 72px;
                left: 0;
                right: 0;
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 2rem;
                gap: 0.5rem;
                transform: translateY(-120%);
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                border-bottom: 1px solid var(--glass-border);
            }

            .nav-links.open {
                transform: translateY(0);
            }

            .nav-links a {
                width: 100%;
                text-align: center;
                padding: 1rem;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .footer-bottom {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }

            .container {
                padding: 0 1rem;
            }
        }

        /* ========== PAGE-SPECIFIC STYLES ========== */
        @yield('styles')
    </style>
    @yield('head')
</head>
<body>
    <div class="bg-glow"></div>

    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="navbar-inner">
            <a href="/" class="logo">⚡ ChakriEngine</a>

            <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
                <li><a href="/jobs" class="{{ request()->is('jobs*') ? 'active' : '' }}">Browse Jobs</a></li>
                <li><a href="/categories" class="{{ request()->is('categories*') ? 'active' : '' }}">Categories</a></li>
                <li><a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                <li><a href="/contact" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                <li><a href="/api/jobs" target="_blank" class="nav-cta">🔌 API</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-grid">
                <div class="footer-brand">
                    <a href="/" class="logo">⚡ ChakriEngine</a>
                    <p>The smartest job aggregator platform. We crawl thousands of sources so you can find your dream opportunity in seconds.</p>
                </div>
                <div class="footer-col">
                    <h4>Platform</h4>
                    <ul>
                        <li><a href="/jobs">Browse Jobs</a></li>
                        <li><a href="/categories">Categories</a></li>
                        <li><a href="/api/jobs" target="_blank">API Access</a></li>
                        <li><a href="/about">About Us</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Job Types</h4>
                    <ul>
                        <li><a href="/jobs?type=full-time">Full Time</a></li>
                        <li><a href="/jobs?type=remote">Remote</a></li>
                        <li><a href="/jobs?type=contract">Contract</a></li>
                        <li><a href="/jobs?type=internship">Internship</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="/contact">Contact Us</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} ChakriEngine. Built with Laravel, Scout & ❤️</p>
                <div class="footer-socials">
                    <a href="#" title="GitHub">GH</a>
                    <a href="#" title="Twitter">TW</a>
                    <a href="#" title="LinkedIn">LI</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');
        menuToggle.addEventListener('click', () => {
            navLinks.classList.toggle('open');
        });

        // Close menu on link click
        navLinks.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navLinks.classList.remove('open');
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            const currentScroll = window.pageYOffset;
            if (currentScroll > 100) {
                navbar.style.background = 'rgba(255, 255, 255, 0.95)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.75)';
            }
            lastScroll = currentScroll;
        });
    </script>
    @yield('scripts')
</body>
</html>
