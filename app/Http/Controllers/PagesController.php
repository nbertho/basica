<?php
namespace App\Http\Controllers;
use App\Http\Models\Page as PagesMdl;
use Illuminate\Support\Facades\View;

class PagesController extends Controller {

  public function redirectToPage($idPage = 1) {
    $homeRequest = PagesMdl::find($idPage);
    $slug = $homeRequest['slug'];
    return redirect()->route('pages.show', ['id' => $idPage, "slug" => $slug]);
  }

  public function index() {
    $pages = PagesMdl::all();
    return $pages;
  }

  public function showAction($id){
    $page = PagesMdl::find($id);
    return View::make('pages.show',compact('page'));
  }

}
