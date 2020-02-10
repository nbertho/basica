{{--

  Vues des pages

  Variable : $page: OBJ(id, titre, slug, sous_titre, texte, tri, created_at, updated_at)

--}}
@extends ('template.app')

@section('titre')
  {{ $page->titre }}
@stop

@section('contenu')

  @if ($page->id !== 1)
    <!-- Page Title -->
      <div class="section section-breadcrumbs">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h1>{{ $page->sous_titre }}</h1>
            </div>
          </div>
        </div>
      </div>
  @endif

  @if ($page->id === 2)
    {{-- Portfolio --}}
      
      @include('projets.index')

  @elseif ($page->id === 3)
    {{-- Blog --}}
      @include('posts.index')

  @elseif ($page->id === 4)
    {{-- Contact --}}
      @include('pages.details.contact')

  @else
    {{-- Home --}}
      @include('pages.details.home')

  @endif


@stop
