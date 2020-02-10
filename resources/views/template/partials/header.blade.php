{{--
  templates/partials/header
--}}

<header class="navbar navbar-inverse navbar-fixed-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ asset('/') }}"><img src="{{ asset('img/logo.png') }}" alt="Basica"></a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <?php
          $pagesCtrl = new App\Http\Controllers\PagesController;
          $pagesMenu = $pagesCtrl->index();
        ?>
        @foreach ($pagesMenu as $pageMenu)
          <li><a href="{{ asset('pages/' . $pageMenu->id . '/' . $pageMenu->slug . '.html') }}">{{ $pageMenu->titre }}</a></li>
        @endforeach
      </ul>
    </div>
  </div>
</header>
