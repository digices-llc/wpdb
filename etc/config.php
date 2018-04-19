<?php

/**
  * @package   digices/wpdb
  * @module    config
  * @author    Roderic Linguri <linguri@digices.com>
  * @copyright 2018 Digices LLC
  * @version   0.0.4
  */

/** SAMPLE CONFIGURATION FILE **/

/**
  Provide a fake $wpdb object in case we are running this without WordPress
**/

global $wpdb;

if (!is_object($wpdb)) {

  class WPDBProxy
  {

    public $prefix;

    public function __construct()
    {
      $this->prefix = <#table_prefix#>;
    }

  }

  global $wpdb;
  
  $wpdb = new WPDBProxy();

} // ./wpdb is not set

// Make sure wp config constants are defined

if (!defined('DB_NAME')) {
  define('DB_NAME', <#dbname#>);
}

if (!defined('DB_PASSWORD')) {
  define('DB_PASSWORD', <#password#>);
}

if (!defined('DB_USER')) {
  define('DB_USER', <#user#>);
}

if (!defined('DB_HOST')) {
  define('DB_HOST', <#host#>);
}
