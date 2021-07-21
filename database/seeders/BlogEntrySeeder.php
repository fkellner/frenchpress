<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BlogEntry;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BlogEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ex1 = BlogEntry::create([
          'title' => 'Hello Blogosphere!',
          'content' => '# Die Wortberge
>  Weit hinten, hinter den Wortbergen, fern der Länder Vokalien und Konsonantien leben die Blindtexte.
>  Abgeschieden wohnen sie in Buchstabhausen an der Küste des Semantik, eines großen Sprachozeans.
>  Ein kleines Bächlein namens [Duden](https://duden.de) fließt durch ihren Ort und versorgt sie mit den nötigen Regelialien.
>  Es ist ein paradiesmatisches Land, in dem einem gebratene Satzteile in den Mund fliegen.
>  Nicht einmal von der allmächtigen Interpunktion werden die Blindtexte beherrscht – ein geradezu unorthographisches Leben.


    var x = 1;
    const y = 2;



**Eines Tages** aber beschloß eine kleine Zeile Blindtext, ihr Name war *Lorem Ipsum,* hinaus zu gehen in die weite Grammatik. Der große Oxmox riet ihr davon ab, da es dort wimmele von bösen Kommata, wilden Fragezeichen und hinterhältigen Semikoli, doch das Blindtextchen ließ sich nicht beirren. Es packte seine sieben Versalien, schob sich sein Initial in den Gürtel und machte sich auf den Weg.

## Materialien:

* Sieben Versalien
* Initial
	* Nested List 1
	* Nested UL 2
* Gürtel

1. Versalie 1
3. Versalie 2
4. Versalie 4
6. Versalie 7

Als es die ersten Hügel des Kursivgebirges erklommen hatte, warf es einen letzten Blick zurück auf die Skyline seiner Heimatstadt Buchstabhausen, die Headline von Alphabetdorf und die Subline seiner eigenen Straße, der Zeilengasse. `echo "test inline code"` Wehmütig lief ihm eine rhetorische Frage über die Wange, dann setzte es seinen Weg fort. Unterwegs traf es eine Copy. Die Copy warnte das Blindtextchen, da, wo sie herkäme wäre sie zigmal umgeschrieben worden und alles, was von ihrem Ursprung noch übrig wäre, sei das Wort "und" und das Blindtextchen solle umkehren und wieder in sein eigenes, sicheres Land zurückkehren.

![Nashorn](https://www.prowildlife.de/wp-content/uploads/2017/08/nashorn-1281695_1920-quadratisch.jpg)',
          'publication_date' => new Carbon('2021-07-18 12:00:00'),
          'header_image' => ''
        ]);
        $img_path1 = 'headers/'.$ex1->id.'/header.jpg';
        Storage::disk('public')->put(
          $img_path1,
          Storage::get('example_images/anshu-a-french-press-unsplash.jpg'),
        );
        $ex1->header_image = $img_path1;
        $ex1->save();

        $ex2 = BlogEntry::create([
          'title' => 'Reden ist Silber...',
          'content' => 'Das hier ist ein kurzer Artikel,
der nur zwei Zeilen enthält.',
          'publication_date' => new Carbon('2021-06-18 10:00:00'),
          'header_image' => ''
        ]);
        $img_path2 = 'headers/'.$ex2->id.'/header.jpg';
        Storage::disk('public')->put(
          $img_path2,
          Storage::get('example_images/daffa-z-french-press-unsplash.jpg'),
        );
        $ex2->header_image = $img_path2;
        $ex2->save();

        $ex3 = BlogEntry::create([
          'title' => 'Read Me!',
          'content' => '# French Press - Keeps you awake at night!

Why use a time-tested, well documented content management system when you could use something a college student hacked together for an assignment real quick?
Enjoy the thrill of never knowing when something might stop working, and lay awake worrying about all the security vulnerabilities that they might have missed!

## Installation
French Press is based on laravel, which means you do not only need to have one, but two package managers installed: `composer` and `npm`.

Database-wise, you just need to copy the `.env.example` to `.env` and - assuming you have the php sqlite3 database drivers installed on your system, everything should work out fine.

To just have a look at it, running `composer install` followed by `php artisan migrate --seed && php artisan serve` should be enough.

If you changed something and need to recompile assets, you need to `npm install && npm run dev`.

For the file storage to work properly, you need to execute `php artisan storage:link`.

And, as always when you are developing for the web and using package managers: Don\'t try to start this without an active internet connection!

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
          ',
          'publication_date' => new Carbon('2021-08-18 14:00:00'),
          'header_image' => ''
        ]);
        $img_path3 = 'headers/'.$ex3->id.'/header.jpg';
        Storage::disk('public')->put(
          $img_path3,
          Storage::get('example_images/rachel-brenner-french-press-unsplash.jpg'),
        );
        $ex3->header_image = $img_path3;
        $ex3->save();

    }
}
