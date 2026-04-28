# ChakriEngine - Automated Job Aggregator

ChakriEngine is a modern, automated job aggregator built with Laravel. It fetches jobs from the Adzuna API, stores them in a local database, and provides a fast, searchable REST API using Laravel Scout.

## Features
- **Automated Aggregation:** A scheduled Laravel console command fetches the latest jobs daily.
- **RESTful API:** Clean API endpoints to list and search jobs.
- **Search:** Integrated with Laravel Scout for fast text-based search.
- **Caching:** Uses Redis/File cache to serve frequent searches extremely fast without hitting the database.
- **Rate Limiting:** Protects the API from abuse (60 requests/minute).

## Setup Instructions

1. Clone the repository and install dependencies:
```bash
composer install
```

2. Copy `.env.example` to `.env` and configure your database settings:
```bash
cp .env.example .env
php artisan key:generate
```

3. Add your Adzuna API credentials to `.env`:
```env
ADZUNA_APP_ID=your_adzuna_app_id
ADZUNA_APP_KEY=your_adzuna_app_key
```
You can get a free API key at [developer.adzuna.com](https://developer.adzuna.com/).

4. Configure the database connection in `.env` (e.g., using SQLite for local development):
```env
DB_CONNECTION=sqlite
```
Create an empty `database/database.sqlite` file, then run migrations:
```bash
php artisan migrate
```

5. Install and configure Laravel Scout:
Ensure your `SCOUT_DRIVER` is set in `.env` (Database engine is recommended for simplicity):
```env
SCOUT_DRIVER=database
```

6. Run the job fetcher to populate the database:
```bash
php artisan jobs:fetch
```

7. Start the local development server:
```bash
php artisan serve
```

## API Endpoints

### 1. List Jobs
Retrieves a paginated list of all aggregated jobs.
**Endpoint:** `GET /api/jobs`
**Parameters:**
- `page` (optional): The page number for pagination.

### 2. Search Jobs
Searches for jobs based on a query.
**Endpoint:** `GET /api/jobs/search`
**Parameters:**
- `q` (required): The search keyword (e.g., "laravel").
- `page` (optional): The page number for pagination.

**Example Request:**
```
GET /api/jobs/search?q=laravel
```

## Automation
To keep the jobs updated automatically, ensure your server runs the Laravel scheduler every minute. Add the following Cron entry:
```
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```
