# Tasks for Today (Laravel)

A four-page task manager for IT0049 TSA3, rebuilt from the earlier CodeIgniter Tasks for Today project. The Welcome page shows only tasks scheduled for the current day. All Tasks shows the complete schedule, Profile reads one demo user from the database, and About describes the project and developer.

## Requirements

- PHP 8.5 (or a version accepted by this project's `composer.json` and `composer.lock`)
- Composer
- SQLite extension for PHP

## Run locally

From this project folder in PowerShell:

```powershell
composer install
Copy-Item .env.example .env
New-Item database/database.sqlite -ItemType File -Force
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

If `php` still points to an older XAMPP installation, use the PHP executable at `C:\Users\Henrich\.config\herd-lite\bin\php.exe` in place of `php`. The local site opens at `http://127.0.0.1:8000`.

| Page | URL | Data shown |
| --- | --- | --- |
| Welcome | `/` | Today's tasks only |
| All Tasks | `/tasks` | All tasks ordered by scheduled date |
| Profile | `/profile` | One user record |
| About | `/about` | Static project and developer information |

The timezone is `Asia/Manila` in `config/app.php`. The seeder creates nine tasks across the day before yesterday, yesterday, today, and tomorrow, plus one demo user. Run `php artisan migrate:fresh --seed` if you want to reset the local demo database; this deletes existing local records. The screens read from SQLite through Eloquent rather than PHP arrays.

## Key files

- `database/migrations/`: task table and POS user fields
- `database/seeders/`: task and user sample records
- `app/Models/`: Task and User Eloquent models
- `app/Http/Controllers/`: page data queries
- `routes/web.php`: the four page URLs
- `resources/views/`: Blade layout and pages
- `public/style.css`: pixel-inspired theme from the previous project

Run `php artisan test --compact` to check the pages and their database-backed output.

The background animation and portrait are loaded from ImageKit and require an internet connection. This project currently has the four read-only pages required by TSA3; it does not include the later CRUD or login features of the CodeIgniter project.
