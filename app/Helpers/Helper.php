<?php
  namespace App\Helpers;

class Helper {

  /**
   * Fonction pour vérifier que le Helper est bien chargé
   * @return string [  echo "La Class Helper est bien chargée"]
   */
  public static function test() {
    echo "La Class Helper est bien chargée";
  }

  /**
   * [Decoupe le texte apres $nmbr de mots ou de characteres]
   * 
   * @param  string $type [type de limite (mot : w,W,m,M ou lettres : c,C,l,L)]
   * @param  int    $nmbr [limite de mot/lettre à prendre]
   * @param  string $data [chaine de charactères à couper]
   * @param  string $end [charactères à ajouter à la fin]
   * 
   * @return string       [retourne le texte découpé]
   */
  public static function limitText(string $type, int $nmbr, string $data, string $end = " ... ") {
    $data = str_replace(['<h1>', '</h1>', '<h2>', '</h2>', '<h3>', '</h3>', '<h4>', '</h4>', '<p>', '</p>',] , "" , $data );
    if ($type === "w" || $type === "W" || $type === "m" || $type === "M") {
      $texteSplit = explode(" ", $data);
      $array = array_slice( $texteSplit , 0, $nmbr);
      $strToReturn = implode(" " , $array );
    }
    elseif ($type === "c" || $type === "C" || $type === "l" || $type === "L") {
      $strToReturn = substr($data, 0, $nmbr);;
    }
    else {
      echo "Erreur, le format attendu est : limitText($type, $nmbr, $data, $end = ' ... ') avec $type = w - W - m - M - c - C -l - L";
    }
    return $strToReturn . $end;
  }

  /**
   * Retourne la date au format jour - mois - année avec le mois en français
   * 
   * @param  string $data [date format datetime]
   * 
   * @return string       [echo : jour mois(vf) année]
   */
  public static function dateFr(string $data) {
    $dataSplit = explode("-", $data);
    $year = $dataSplit[0];
    $month = $dataSplit[1];
    $day = str_split($dataSplit[2], 2);
    switch ($month) {
      case 1:
        $month = "janvier";
        break;
      case 2:
        $month = "février";
        break;
      case 3:
        $month = "mars";
        break;
      case 4:
        $month = "avril";
        break;
      case 5:
        $month = "mai";
        break;
      case 6:
        $month = "juin";
        break;
      case 7:
        $month = "juillet";
        break;
      case 8:
        $month = "aout";
        break;
      case 9:
        $month = "septembre";
        break;
      case 10:
        $month = "octobre";
        break;
      case 11:
        $month = "novembre";
        break;
      case 12:
        $month = "décembre";
        break;
      default:
        echo "<h1>Erreur dans la conversion de la date (Format attendu : mois en chiffre)</h1>";
        break;
    }
    echo $day[0] . " " . $month . " " . $year;
  }

}
