<?php
  echo '<?xml version="1.0"?>';
  use App\Helpers\Helper;
?>
{{--

  Variable : $post: OBJ(id, titre, slug, texte, image, created_at, updated_at, categories_id)

--}}

<rss xmlns:g="http://base.google.com/ns/1.0" version="2.0">

  <channel>
    <title>Basica</title>
    <link>{{ url('/') }}</link>
    <description>Basica - RSS Feed</description>
    <language>Fr</language>
    @foreach ($data as $post)
      <item>
        <title>{{ $post->titre }}</title>
        <guid isPermaLink="false">{{ $post->slug }}</guid>
        <pubDate>
          <?php
            $pubDate= date("D, d M Y H:i:s T", strtotime($post->created_at));
            echo $pubDate;
          ?>
        </pubDate>
        <description>
          <?php
            echo strip_tags($post->texte);
          ?>
        </description>
        <link>{{ asset('post/' . $post->id . '/' . $post->slug . '.html') }}</link>
      </item>
    @endforeach

  </channel>
</rss>
