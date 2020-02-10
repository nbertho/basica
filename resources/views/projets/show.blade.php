{{--

  Variable : $projet: (id, nom, slug, texte, image, mise_en_avant, created_at, updated_at, clients_id)

--}}
<?php
  use App\Helpers\Helper;
?>
@extends ('template.app')

@section('titre')
  {{ $projet->nom }}
@stop

@section('contenu')

<!-- Page Title -->
<div class="section section-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Product Details</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <!-- Product Image & Available Colors -->
      <div class="col-sm-6">
        <div class="product-image-large">
          <img src="{{ asset('uploads/' .  $projet->image) }}" alt="{{ $projet->nom }}">
        </div>
        <div class="colors">
          <span class="color-white"></span>
          <span class="color-black"></span>
          <span class="color-blue"></span>
          <span class="color-orange"></span>
          <span class="color-green"></span>
        </div>
      </div>
      <!-- End Product Image & Available Colors -->
      <!-- Product Summary & Options -->
      <div class="col-sm-6 product-details">
        <h2>{{ $projet->nom }}</h2>
        <h3>Quick Overview</h3>
        {!! html_entity_decode($projet->texte) !!}
        <h3>Project Details</h3>
        <?php $clientsCtrl = new App\Http\Controllers\ClientsController; ?>
        <p>
          <strong>Client: </strong>
          <?php $client = $clientsCtrl->find($projet->clients_id); ?>
          {{ $client->nom }}
        </p>
        <p><strong>Date: </strong><?php Helper::dateFr($projet->created_at); ?></p>
        <?php
        $tagsCtrl = new App\Http\Controllers\TagsController;
        $tags = $tagsCtrl->find($projet->id);
        ?>
        <p>
          <strong>Tags: </strong>
          @foreach($tags as $tag)
            @if ($loop->last)
              {{ $tag->nom }}
            @else
              {{ $tag->nom }},
            @endif
          @endforeach
        </p>
      </div>
      <!-- End Product Summary & Options -->

    </div>
  </div>
</div>

<hr>

<div class="section">
  <div class="container">
    <div class="row">

      <div class="section-title">
        <h1>Similar Works</h1>
      </div>

      <ul class="grid cs-style-2">
        <?php
          $projetsCtrl = new App\Http\Controllers\ProjetsController;
          $relatedProjets = $projetsCtrl->findRelated($projet->id);
          $clientsCtrl = new App\Http\Controllers\ClientsController;
          $i = 0;
        ?>

        @foreach($relatedProjets as $id)
          <?php
            $singleProjet = $projetsCtrl->findOne($id);
            $i++;
          ?>
          <div class="col-md-3 col-sm-6">
            <figure>
              <img src="{{ asset('uploads/' .  $singleProjet->image) }}" alt="img04">
              <figcaption>
                <h3>{{ $singleProjet->nom }}</h3>
                <span>
                  <?php $client = $clientsCtrl->find($singleProjet->clients_id); ?>
                  {{ $client->nom }}
                </span>
                <a href="{{ asset('projet/' . $singleProjet->id . '/' . $singleProjet->slug . '.html') }}">Take a look</a>
              </figcaption>
            </figure>
          </div>
        @endforeach

      </ul>

    </div>
  </div>
</div>

@stop
