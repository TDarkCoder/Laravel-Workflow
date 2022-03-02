#Laravel workflow

##Installation manual
- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan workflow:dump pull_request --class=App\Models\PullRequest --format=svg --path=public
