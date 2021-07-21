<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'MyFunkyBlog' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
document.addEventListener('DOMContentLoaded', () => {

  // Get all "navbar-burger" elements
  const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

  // Check if there are any navbar burgers
  if ($navbarBurgers.length > 0) {

    // Add a click event on each of them
    $navbarBurgers.forEach( el => {
      el.addEventListener('click', () => {

        // Get the target from the "data-target" attribute
        const target = el.dataset.target;
        const $target = document.getElementById(target);

        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        el.classList.toggle('is-active');
        $target.classList.toggle('is-active');

      });
    });
  }

});
    </script>
  </head>
  <body class="has-navbar-fixed-top has-background-light">
<nav class="navbar is-fixed-top" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="{{route('home')}}">
      <img src="/storage/logo/logo.svg" height="28">
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="mainMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="mainMenu" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="{{route('home')}}">
        Home
      </a>

      <a class="navbar-item" href="{{route('planned')}}">
        Scheduled Posts
      </a>

      <a class="navbar-item" href="about">
        About me
      </a>

      <!--<div class="navbar-item has-dropdown is-hoverable">
        <a class="navbar-link">
          More
        </a>

        <div class="navbar-dropdown">
          <a class="navbar-item">
            About
          </a>
          <a class="navbar-item">
            Jobs
          </a>
          <a class="navbar-item">
            Contact
          </a>
          <hr class="navbar-divider">
          <a class="navbar-item">
            Report an issue
          </a>
        </div>
      </div>-->
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary"
             href="{{route('create_blogentry')}}">
            <strong>Create Post</strong>
          </a>
          <a class="button is-danger"
             href="">
            Logout
          </a>
        </div>
      </div>
    </div>
  </div>
</nav>
    {{ $slot }}
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      <a href="impressum">Impressum</a>
    </p>
    <p>
      made with anxiety and <a href="">FrenchPress</a>
    </p>
  </div>
</footer>
  </body>
</html>
