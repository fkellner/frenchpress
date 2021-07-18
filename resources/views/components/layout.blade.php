<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'MyFunkyBlog' }}</title>
    <link rel="stylesheet" href="css/app.css">
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
  <body>
<nav class="navbar" role="navigation" aria-label="main navigation">
  <div class="navbar-brand">
    <a class="navbar-item" href="">
      <!--<img src="https://bulma.io/images/bulma-logo.png" width="112" height="28">-->
      LOGO
    </a>

    <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="mainMenu">
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
      <span aria-hidden="true"></span>
    </a>
  </div>

  <div id="mainMenu" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item" href="">
        Home
      </a>

      <a class="navbar-item" href="about">
        About the author
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
      </div>
    </div>-->

    <div class="navbar-end">
      <!--<div class="navbar-item">
        <div class="buttons">
          <a class="button is-primary">
            <strong>Sign up</strong>
          </a>
          <a class="button is-light">
            Log in
          </a>
        </div>
      </div>-->
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
