# CHAKRIENGINE 🇧🇩

> The most advanced tech job aggregator for Bangladesh — scraping the web to find your next big opportunity.

![License](https://img.shields.io/badge/license-Apache_2.0-6366f1)
![PHP](https://img.shields.io/badge/PHP-8.2+-777bb4?logo=php)
![Laravel](https://img.shields.io/badge/Laravel-12.x-ff2d20?logo=laravel)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-4.0-38bdf8?logo=tailwind-css)
![SQLite](https://img.shields.io/badge/SQLite-Latest-003b57?logo=sqlite)

---

## ✨ Features

- 🕵️ **Automated Job Aggregator** — Periodically fetches the latest tech jobs from the Adzuna API using custom Artisan commands.
- 🔍 **Advanced Search** — Powered by Laravel Scout for blazing-fast, full-text searching across thousands of listings.
- ⚡ **Robust RESTful API** — Clean, documented, and rate-limited API for developers to access job data programmatically.
- 🎨 **Premium Dark UI** — A stunning, glassmorphic design system built with Tailwind CSS 4.0 and the 'Outfit' typography.
- 🚀 **Performance Focused** — Implements internal caching, optimized database queries, and pagination for a seamless user experience.
- 🔐 **Enterprise-Ready Auth** — Secure API authentication using Laravel Sanctum and built-in rate limiting protection.

---

## 🛠️ Tech Stack

| Layer | Technology |
|---|---|
| **Core Framework** | Laravel 12 (PHP 8.2+) |
| **Frontend** | Blade + Tailwind CSS 4.0 + Vite |
| **Database** | SQLite / MySQL / PostgreSQL |
| **Search Engine** | Laravel Scout (Database Driver) |
| **API Client** | Laravel HTTP Client |
| **Authentication** | Laravel Sanctum |
| **Task Scheduling** | Laravel Command Bus (Artisan) |

---

## 📁 Project Structure

```
ChakriEngine/
├── app/
│   ├── Console/Commands/
│   │   └── FetchJobs.php      # Scraper: php artisan jobs:fetch
│   ├── Http/Controllers/
│   │   └── Api/
│   │       └── JobController.php  # API Logic (index, search)
│   ├── Models/
│   │   └── JobListing.php     # Job listing schema & Scout configuration
│   └── Services/
│       └── AdzunaService.php  # Third-party API integration logic
│
├── database/
│   └── migrations/            # Database schema definitions
│
├── resources/
│   ├── views/
│   │   └── welcome.blade.php  # Main Glassmorphic UI
│   └── css/
│       └── app.css            # Tailwind 4.0 design system
│
├── routes/
│   ├── api.php                # Job search & data endpoints
│   └── web.php                # Frontend routes
│
├── .env.example               # Configuration template
├── artisan                    # Laravel CLI
└── composer.json              # Backend dependencies
```

---

## 🚀 Getting Started

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- [Adzuna API Credentials](https://developer.adzuna.com/)

### 1. Clone the repository

```bash
git clone https://github.com/YOUR_USERNAME/ChakriEngine.git
cd ChakriEngine
```

### 2. Install dependencies

```bash
# Install PHP dependencies
composer install

# Install Frontend dependencies
npm install
```

### 3. Environment Configuration

```bash
cp .env.example .env
php artisan key:generate
```

Open `.env` and add your Adzuna API credentials:

```env
ADZUNA_APP_ID=your_app_id
ADZUNA_APP_KEY=your_app_key
```

### 4. Database Setup

```bash
# Create SQLite database (if using sqlite)
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### 5. Fetch Initial Job Data

Populate your database by running the custom aggregator command:

```bash
php artisan jobs:fetch
```

### 6. Run the Application

```bash
# Start both PHP server and Vite dev server
npm run dev
```

The application will be available at `http://localhost:8000`.

---

## 🔑 API Endpoints

| Method | Endpoint | Description |
|---|---|---|
| `GET` | `/api/jobs` | Fetch all paginated job listings |
| `GET` | `/api/jobs/search?q={query}` | Search jobs using Scout full-text search |
| `GET` | `/api/user` | Fetch authenticated user (Sanctum) |

*Note: All API routes are rate-limited to 60 requests per minute by default.*

---

## 🛡️ Security

- **Rate Limiting**: Throttles API requests to prevent abuse.
- **Sanctum**: Provides a featherweight authentication system for SPAs and APIs.
- **Environment Safety**: Sensitive keys are kept in `.env` and excluded from version control.

---

## 📄 License

This project is open-source software licensed under the [Apache-2.0 license](LICENSE).
