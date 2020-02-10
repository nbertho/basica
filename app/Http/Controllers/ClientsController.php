<?php
namespace App\Http\Controllers;
use App\Http\Models\Client as ClientsMdl;
use Illuminate\Support\Facades\View;

class ClientsController extends Controller {

  /**
   * Renvois les données de toutes les clients
   *
   * @return  array  Tableau contenant des objets avec les données des clients
   */
  public function index() {
    $clients = ClientsMdl::all();
    return $clients;
  }

  /**
   * Renvois les données d'un client ayant l'id $id
   *
   * @param   int  $id  id du client
   *
   * @return  obj       Objet contenant les infos d'un client
   */
  public function find( int $id) {
    $client = ClientsMdl::find($id);
    return $client;
  }

}
