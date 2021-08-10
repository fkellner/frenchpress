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
          'title' => 'Getting Started',
          'content' => '> A programmer is a machine that turns coffee into code.
>   - Somebody on the internet

Frenchpress is here to help you turn _coffee_ into **blog**.
You have managed to get the server installed and access it from the browser, what next?

## First Steps

### Logging in

Because hopefully, a lot of people will visit your website, but only you want to log in and edit content, the [admin login](/login) is not a very prominent link, but hidden in the footer.

### Updating legal information

When operating a website that is publicly accessible, you don\'t want to be sued just for forgetting to add some legalese. In the menu under "Settings", you will find a template that will most probably work fine if you are operating your blog from Germany. Otherwise, you will have to do the research yourself, or just say "fuck it", enter your contect details and hope for the best.

### Theme your page

While you are there, you might as well already change the theme of the blog to the one that suits you best. And you can upload your own logo in place of the default one! Although you can live-preview the themes, don\'t forget to hit the "Save"-button in the end.

### Adding Content

If you have not found the button already, it is hidden behind the hamburger menu. Each Post has a title, header image, publication date and content.
- Title is self-explanatory
- Header-Image will let you select a file, and preview the file name. It is uploaded after you save the post. Be aware that the filename of the image will not be changed when it is stored on the server!
- The publication date is used to order your posts.
  - You can set it to the future so that the post is published automatically.
  -  Pro-Tip: If you want to "soft-delete" a post, simply set its publication date somewhere in the year 2099!
- The content can be written in Markdown - in the editor, there is a link that will show you what that means. Or you can simply use the buttons and use this post as a reference.

## Advanced Usage

### Adding HTML to your Markdown

Because allowing HTML code also means allowing `<script>` tags, anything that looks like HTML will be removed from your posts, including stuff in angular brackets like `<this>`. This is a security measure meant to keep you from inadvertently delivering malicious content to your users.

If you know HTML and know what you are doing, you can allow the rendering of HTML in the settings. If you successfully enabled HTML and navigated to this post, you should see an alert:

```js
window.alert(\'JavaScript successfully activated! Be careful what you put in your posts now!\');
```

<script>
	window.alert(\'JavaScript successfully activated! Be careful what you put in your posts now!\');
</script>

## Have fun!
For reference purposes, here is an image of a rhinoceros:


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
          'title' => 'Second Example Post',
          'content' => 'This is a second post
containing only two lines.',
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
          'title' => 'Third Example Post',
          'content' => 'Nothing to see here',
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
