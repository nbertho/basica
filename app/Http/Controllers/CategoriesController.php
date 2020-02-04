<?php
namespace App\Http\Controllers;
use App\Http\Models\Categorie as CategoriesMdl;
use Illuminate\Support\Facades\View;

class CategoriesController extends Controller {

  public function index() {
    $categories = CategoriesMdl::all();
    return $categories;
  }

}
