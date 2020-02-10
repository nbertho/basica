{{--

  Variable : $post : OBJ(id, titre, slug, texte, image, created_at, updated_at, categories_id)

--}}
<?php
  use App\Helpers\Helper;
?>
@extends('template.app')

@section('titre')
  {{ $post->titre }}
@stop


<!-- Page Title -->
<div class="section section-breadcrumbs">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Blog Post</h1>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">
    <div class="row">
      <!-- Blog Post -->
      <div class="col-sm-8">
        <div class="blog-post blog-single-post">
          <div class="single-post-title">
            <h2>{{ $post->titre }}</h2>
          </div>

          <div class="single-post-image">
            <img src="{{ asset('uploads/' .  $post->image) }}" alt="Post Title">
          </div>
          <div class="single-post-info">
            <i class="glyphicon glyphicon-time"></i><?php Helper::dateFr($post->created_at); ?> <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
          </div>
          <div class="single-post-content">
            {!! html_entity_decode($post->texte) !!}
          </div>
        </div>
      </div>
      <!-- End Blog Post -->
      <!-- Sidebar -->
      <div class="col-sm-4 blog-sidebar">

        <h4>Recent Posts</h4>
        <ul class="recent-posts">
          <?php
            $postsCtrl = new App\Http\Controllers\PostsController;
            $lastPosts = $postsCtrl->findLimit(5);
          ?>
          @foreach($lastPosts as $lastPost)
            <li><a href="{{ asset('post/' . $lastPost->id . '/' . $lastPost->slug . '.html') }}">{{ $lastPost->titre }}</a></li>
          @endforeach
        </ul>
        <h4>Categories</h4>
        <ul class="blog-categories">
          <?php
            $categoriesCtrl = new App\Http\Controllers\CategoriesController;
            $categories = $categoriesCtrl->index()
          ?>
          @foreach($categories as $categorie)
            <li><a href="{{ asset('categorie/' . $categorie->id . '/' . $categorie->slug . '.html') }}">{{ $categorie->nom }}</a></li>
          @endforeach
        </ul>
      </div>
      <!-- End Sidebar -->
    </div>
  </div>
</div>
