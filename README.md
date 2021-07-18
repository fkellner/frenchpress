# French Press - Keeps you awake at night!

Why use a time-tested, well documented content management system when you could use something a college student hacked together for an assignment real quick?
Enjoy the thrill of never knowing when something might stop working, and lay awake worrying about all the security vulnerabilities that they might have missed!

French Press is in no way associated with the excellent French Press Markdown-Editor project, but of course it is being used here (what else?) :)

## Installation
French Press is based on laravel, which means you do not only need to have one, but two package managers installed: `composer` and `npm`.

Database-wise, you just need to copy the `.env.example` to `.env` and - assuming you have the php sqlite3 database drivers installed on your system, everything should work out fine.

To just have a look at it, running `composer install` followed by `php artisan migrate --seed && php artisan serve` should be enough.

If you changed something and need to recompile assets, you need to `npm install && npm run dev`.

And, as always when you are developing for the web and using package managers: Don't try to start this without an active internet connection! 

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
