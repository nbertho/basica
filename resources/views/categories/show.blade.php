{{--

  Vue des posts triés par categories

  Variable : $posts: ARRAY( OBJ(id, titre, slug, texte, image, created_at, updated_at, categories_id))

--}}
@extends ('template.app')

@section('titre')
{{ $categorie->nom }}
@stop

@section('contenu')

<div class="section">
  
  <div class="container">
    <div class="row">
      <br>
      <br>
      <br>
      <br>
    <h1>Les posts de la categories : {{ $categorie->nom }}</h1>
      @foreach ($posts as $post)
      <div class="col-sm-6">
        <div class="blog-post blog-single-post">
        
          <div class="single-post-title">
            <h2>{{ $post->titre }}</h2>
          </div>

          <div class="single-post-image">
            <img src="{{ asset('uploads/' . $post->image) }}" alt="Post Title">
          </div>
      
          <div class="single-post-info">
            <i class="glyphicon glyphicon-time"></i>15 OCT, 2014 <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
          </div>
        
          <div class="single-post-content">
            <p>{!! html_entity_decode($post->texte) !!}</p><a href="{{ asset('post/' . $post->id . '/' . $post->slug . '.html') }}" class="btn">Read more</a>
          </div>   
        
          
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

@stop
