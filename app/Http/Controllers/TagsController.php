<?php
namespace App\Http\Controllers;
use App\Http\Models\Tag as TagsMdl;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class TagsController extends Controller {

  public function index() {
    $tags = TagsMdl::all();
    return $tags;
  }

  public function find($projetId) {
    $tags = DB::table('projets_has_tags')->join('tags', 'projets_has_tags.tags_id', '=', 'tags.id')->where('projets_id', '=', $projetId)->get();
    return $tags;
  }

}
