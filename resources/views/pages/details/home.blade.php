{{--

  Détails de la page d'accueil (id = 1)

--}}
<?php
  use Illuminate\Support\Str;
  use App\Helpers\Helper;
?>

<section id="main-slider" class="no-margin">
  <div class="carousel slide">
      <?php
        $projetsCtrl = new App\Http\Controllers\ProjetsController;
        $projetsSlider = $projetsCtrl->findHighlighted();
        $iCarousel = count($projetsSlider);
        $carousel = 0;
        $i = 0;
      ?>
    <ol class="carousel-indicators">
      <?php
        while ($carousel < $iCarousel) {
          if ($carousel == 0) {
            echo '<li data-target="#main-slider" data-slide-to="0" class="active"></li>';
          }
          else {
            echo '<li data-target="#main-slider" data-slide-to="' . $carousel . '"></li>';
          }
          $carousel++;
        };
      ?>
    </ol>
    <div class="carousel-inner">
      @foreach ($projetsSlider as $projetSlider)
        @if ($i === 0)
          <div class="item active" style="background-image: url({{ asset('uploads/' . $projetSlider->image) }})">
          <?php $i = 1; ?>
        @else
          <div class="item" style="background-image: url({{ asset('uploads/' .  $projetSlider->image) }})">
        @endif
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
                <div class="carousel-content centered">
                  <h2 class="animation animated-item-1">{{ $projetSlider->nom }}</h2>
                  <p class="animation animated-item-2">
                    <?php
                      $texteSlider = Str::limit(html_entity_decode($projetSlider->texte), 200);
                      echo $texteSlider;
                    ?>
                  </p>
                  <br>
                  <a class="btn btn-md animation animated-item-3" href="{{ asset('projet/' . $projetSlider->id . '/' . $projetSlider->slug . '.html') }}">Learn More</a>
                </div>
              </div>
            </div>
          </div>
        </div><!--/.item-->
      @endforeach
    </div><!--/.carousel-inner-->
  </div><!--/.carousel-->
  <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
    <i class="icon-angle-left"></i>
  </a>
  <a class="next hidden-xs" href="#main-slider" data-slide="next">
    <i class="icon-angle-right"></i>
  </a>
</section><!--/#main-slider-->


<!-- Our Portfolio -->

<div class="section section-white">
  <div class="container">
    <div class="row">

      <div class="section-title">
        <h1>Our Recent Works</h1>
      </div>

      <ul class="grid cs-style-3">

        <?php
          $notHighlightedprojets = $projetsCtrl->findNotHighlighted(6);
          $clientsCtrl = new App\Http\Controllers\ClientsController;
        ?>
        @foreach ($notHighlightedprojets as $notHighlightedprojet)
          <div class="col-md-4 col-sm-6">
            <figure>
              <img src="{{ asset('uploads/' .  $notHighlightedprojet->image) }}" alt="{{ $notHighlightedprojet->nom }}">
              <figcaption>
                <h3>{{ $notHighlightedprojet->nom }}</h3>
                <span>
                  <?php
                    $client = $clientsCtrl->find($notHighlightedprojet->clients_id);
                    echo $client->nom;
                  ?>
                </span>
                <a href="{{ asset('projet/' . $notHighlightedprojet->id . '/' . $notHighlightedprojet->slug . '.html') }}">Take a look</a>
              </figcaption>
            </figure>
          </div>
        @endforeach
      </ul>
    </div>
  </div>
</div>
<!-- Our Portfolio -->

<hr>

<!-- Our Articles -->
<div class="section">
  <div class="container">
    <div class="row">
      <!-- Featured News -->
      <div class="col-sm-6 featured-news">
        <h2>Latest Blog Posts</h2>

        <?php
          $postsCtrl = new App\Http\Controllers\PostsController;
          $lastPosts = $postsCtrl->findLimit(3);
        ?>
        @foreach($lastPosts as $lastPost)
          <div class="row">
            <div class="col-xs-4"><a href="blog-post.html"><img src="{{ asset('uploads/' .  $lastPost->image) }}" alt="{{ $lastPost->titre }}"></a></div>
            <div class="col-xs-8">
              <div class="caption"><a href="blog-post.html">{{ $lastPost->titre }}</a></div>
              <div class="date"><?php Helper::dateFr($lastPost->created_at); ?></div>
              <div class="intro"><?php echo Helper::limitText("w", 20, $lastPost->texte, '. ') ?><a href="{{ asset('post/' . $lastPost->id . '/' . $lastPost->slug . '.html') }}">Read more...</a></div>
            </div>
          </div>
        @endforeach
      </div>
      <!-- End Featured News -->


      <!-- Latest News FB -->
      <div id="twitterNews" class="col-sm-6 latest-news">
        <h2>Lastest Twitter News</h2>
        <a class="twitter-timeline" data-height="400" href="https://twitter.com/BerthoWeb?ref_src=twsrc%5Etfw">Tweets by BerthoWeb</a> 
        <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>

      </div>
      <!-- End Featured News -->

    </div>
  </div>
</div>