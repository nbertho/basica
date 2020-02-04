{{--

  Variable :  $page: OBJ(id, titre, slug, sousTitre, texte, tri, created_at, updated_at)
              $projet (id, nom, slug, texte, image, mise_en_avant, created_at, updated_at, clients_id)

--}}
<?php

  $showAmount = 12;
  if (isset($_GET['show'])) {
    $nombreArticle = $_GET['show'];
    $showAmount = $nombreArticle + 6;
  }
  else {
    $nombreArticle = 6;
  }
?>
<div class="section">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        {!! html_entity_decode($page->texte) !!}
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">

      <ul class="grid cs-style-2">
        <?php
          $projetsCtrl = new App\Http\Controllers\ProjetsController;
          $projets = $projetsCtrl->find($nombreArticle);
          $clientsCtrl = new App\Http\Controllers\ClientsController;
        ?>
        @foreach ($projets as $projet)
          <div class="col-md-4 col-sm-6">
            <figure>
              <img src="{{ asset('img/portfolio/' . $projet->image . '.jpg') }}" alt="img04">
              <figcaption>
                <h3>{{ $projet->nom }}</h3>
                <span>
                  <?php $client = $clientsCtrl->find($projet->clients_id); ?>
                  {{ $client->nom }}
                </span>
                <a href="{{ asset( 'projet/' . $projet->id . '/' . $projet->slug . '.html') }}">Take a look</a>
              </figcaption>
            </figure>
          </div>
        @endforeach
      </ul>
    </div>

<?php if (isset($nombreArticle)): ?>
  <ul class="pager">
    <li><a href="{{ route('pages.show', ['id'=>$page->id, 'slug'=>$page->slug, 'show'=>$showAmount]) }}">More works</a></li>
  </ul>
<?php endif; ?>


  </div>
</div>
