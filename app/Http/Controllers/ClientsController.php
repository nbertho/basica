<?php
namespace App\Http\Controllers;
use App\Http\Models\Client as ClientsMdl;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller {

  public function index() {
    $clients = ClientsMdl::all();
    return $clients;
  }

  public function find($id) {
    $client = ClientsMdl::find($id);
    return $client;
  }

}
