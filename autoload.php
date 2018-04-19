<?php

/**
  * @package   digices/wpdb
  * @module    autoload
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Meow Wolf, Inc.
  * @version   0.0.1
  */

/** Autoloader **/

namespace digices\wpdb;

require_once(__DIR__.DIRECTORY_SEPARATOR.'etc'.DIRECTORY_SEPARATOR.'config.php');

require_once(__DIR__.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

if (!function_exists('digices\\wpdb\\load_src')) {

  function load_src() {
    $path = __DIR__.DIRECTORY_SEPARATOR.'src';
    $di = new \DirectoryIterator($path);
    foreach ($di as $item) {
      $fn = $item->getFilename();
      if (substr($fn, 0, 1) != '.') {
        require_once $path.DIRECTORY_SEPARATOR.$fn;
      }
    }
  } // ./load_src

  \digices\wpdb\load_src();

}
