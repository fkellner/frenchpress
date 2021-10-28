# French Press

![French Press Logo](storage/app/example_images/logo.svg)


> A programmer is a machine that turns coffee into code.
>   - Somebody on the internet

_Why use a time-tested, well documented content management system when you could use something a college student hacked together for an assignment real quick?_
Enjoy the thrill of **never knowing when something might stop working**, and lay awake worrying about all the **security vulnerabilities that they might have missed**!

That being said, Frenchpress is here to help you turn _coffee_ into **blog**.


## Installation - Development
Frenchpress is based on [Laravel](https://laravel.com), which means you do not only need to have one, but two package managers installed: [`composer`](https://getcomposer.org) and [`npm`](https://npmjs.org).

Database-wise, you just need to copy the `.env.example` to `.env` and - assuming you have the php sqlite3 database drivers installed on your system, everything should work out fine.

You might want to change the `ADMIN_MAIL` and `ADMIN_DEFAULT_PASSWORD` environment variables, since they are used in the migrations to create the default admin user for your site.

To just have a look at it, running `composer install && composer dump-autoload` followed by `php artisan migrate --seed && php artisan serve` should be enough. Leave the `--seed` argument if you do not want any example blog entries in your database - but think twice, they are a useful reference!

If you changed something and need to recompile assets, you need to `npm install && npm run dev`.

For the file storage to work properly, you need to execute `php artisan storage:link`.

And, as always when you are developing for the web and using package managers: Don't try to start this without an active internet connection!

## Installation - Production

For instructions on how to install a Laravel App for production, see
the [Laravel Documentation](https://laravel.com/docs/8.x/deployment).

## First Steps after the installation

### Logging in

Because hopefully, a lot of people will visit your website, but only you want to log in and edit content, the [admin login](/login) is not a very prominent link, but hidden in the footer.

### Updating legal information

When operating a website that is publicly accessible, you don't want to be sued just for forgetting to add some legalese. In the menu under "Settings", you will find a template that will most probably work fine if you are operating your blog from Germany. Otherwise, you will have to do the research yourself, or just say "fuck it", enter your contect details and hope for the best.

### Theme your page

While you are there, you might as well already change the theme of the blog to the one that suits you best. And you can upload your own logo in place of the default one! Although you can live-preview the themes, don't forget to hit the "Save"-button in the end.

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
window.alert('JavaScript successfully activated! Be careful what you put in your posts now!');
```

<script>
	window.alert('JavaScript successfully activated! Be careful what you put in your posts now!');
</script>

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com).

If you discover a security vulnerability in frenchpress, please send
an e-mail to Florian Kellner via [mr.florian.kellner@posteo.de](mailto:mr.florian.kellner@posteo.de?subject=FrenchPress%20Security%20Vulnerability&content=Please%20describe).

All security vulnerabilities will be promptly addressed.

## License

The Laravel framework as well as FrenchPress are open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Credits

This project is based on [Laravel](https://laravel.com).

The frontend uses [Bulma](https://bulma.io) and [BulmaSwatch](https://jenil.github.io/bulmaswatch) for themes. The markdown editor is [SimpleMDE](https://simplemde.com).

The backend uses the [Laravel-Markdown Component](https://spatie.be/docs/laravel-markdown/v1/installation-setup) for Markdown rendering.
