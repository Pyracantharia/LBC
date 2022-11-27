<?php

namespace App\Utils;


class Utils
{
  public static $siteName = "LD";
  /**
   * Je créer la navbar en lui envoyer des paramètres
   *
   * @param [type] $server
   * @param string $scriptName
   * @param string $title
   * @return string
   */
  public static function navbar($server, string $scriptName, string $title): string
  {
    $class = '';
    /**
     * Je vérifie si le $_SERVER URI envoyer en parametre correspond à la page que je souhaite afficher
     */
    if ($server === $scriptName) {
      $class = ' active';
    }

    return "<li class='nav-item'>
      <a class='nav-link $class' aria-current='page' href='$scriptName'>$title</a>
    </li>";
  }
}
