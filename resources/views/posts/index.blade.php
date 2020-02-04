{{--

  Variable : $post: OBJ(id, titre, slug, texte, image, created_at, updated_at, categories_id)

--}}
<?php
  use Illuminate\Support\Str;
?>

<div class="section">
  <div class="container">
    <div class="row">

      <?php
        $posts = DB::table('posts')->where('categories_id', '!=', 1)->orderBy('created_at', 'desc')->paginate(4);
      ?>

      @foreach ($posts as $post)
        <!-- Blog Post Excerpt -->
        <div class="col-sm-6">
          <div class="blog-post blog-single-post">
            <div class="single-post-title">
              <h2>{{ $post->titre }}</h2>
            </div>

            <div class="single-post-image">
              <img src="{{ asset('img/blog/' . $post->image . '.jpg') }}" alt="Post Title">
            </div>

            <div class="single-post-info">
              <i class="glyphicon glyphicon-time"></i>{{ $post->created_at }} <a href="#" title="Show Comments"><i class="glyphicon glyphicon-comment"></i>11</a>
            </div>

            <div class="single-post-content">
              <p>
                <?php
                  $textePost = Str::limit(html_entity_decode($post->texte), 200);
                  echo $textePost;
                ?>
              </p>
              <a href="{{ asset('post/' . $post->id . '/' . $post->slug . '.html') }}" class="btn">Read more</a>
            </div>
          </div>
        </div>
        <!-- End Blog Post Excerpt -->

      @endforeach

      <div class="pagination-wrapper ">
        {{ $posts->links() }}
      </div>

    </div>
  </div>
</div>
