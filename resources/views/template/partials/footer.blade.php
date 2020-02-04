{{--
  templates/partials/footer
--}}

<div class="footer">
  <div class="container">
    <div class="row">


      <?php
        $footerPostsCtrl = new App\Http\Controllers\PostsController;
        $footerPosts = $footerPostsCtrl->findFooterPosts();
        $i = 0;
      ?>

      @foreach ($footerPosts as $footerPost)

        <div class="col-footer col-md-4 col-xs-6">
          <h3>{{ $footerPost->titre }}</h3>
          {!! html_entity_decode($footerPost->texte) !!}
          @if ($footerPost->id == 2)
            <div>
              <img src="{{ asset('img/icons/facebook.png') }}" width="32" alt="Facebook">
              <img src="{{ asset('img/icons/twitter.png') }}" width="32" alt="Twitter">
              <img src="{{ asset('img/icons/linkedin.png') }}" width="32" alt="LinkedIn">
              <img src="{{ asset('img/icons/rss.png') }}" width="32" alt="RSS Feed">
            </div>
          @endif
        </div>
        <?php $i++ ?>
      @endforeach



    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="footer-copyright">&copy; 2014 <a href="http://www.vactualart.com/portfolio-item/basica-a-free-html5-template/">Basica</a> Bootstrap HTML Template. By <a href="http://www.vactualart.com">Vactual Art</a>.</div>
      </div>
    </div>
  </div>
</div>
