## Laravel workflow

### About

Here you may see Symfony workflow implementation in Laravel. Software is divided into 2 parts:

- `Pull Requests` status management in a workflow manually dumped from configuration
- `Workflow uploads`, where you can upload *.bpmn* and see workflow in a graphic 

## Tools used

[ Javascript, BPMN.js, PHP 8.1 - Laravel 9.2.0, MySQL 8.0 ]

### Installation manual

- composer install
- cp .env.example .env
- php artisan key:generate
- php artisan migrate --seed
- php artisan storage:link
- php artisan workflow:dump pull_request --class=App\Models\PullRequest --format=svg --path=public

*Please, to witness brilliant result of this work, go through installation manual carefully!*
