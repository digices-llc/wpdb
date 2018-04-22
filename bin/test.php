<?php

/**
  * @package   digices/wpdb
  * @module    test
  * @author    Roderic Linguri <linguri@digices.com>
  * @copyright 2018 Digices LLC
  * @version   0.0.2
  */

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'autoload.php';

/**
* Provide a fake $wpdb object in case we are running this without WordPress
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
/**
* Provide empty function definitions in case we are running this without WordPress
**/
if (!function_exists('register_activation_hook')) {
  function register_activation_hook() {
	
  }
}
if (!function_exists('register_deactivation_hook')) {
  function register_deactivation_hook() {
	
  }
}
if (!function_exists('add_action')) {
  function add_action() {
	
  }
}
if (!function_exists('add_settings_section')) {
  function add_settings_section() {
	
  }
}
if (!function_exists('add_settings_field')) {
  function add_settings_field() {
	
  }
}
if (!function_exists('add_menu_page')) {
  function add_menu_page() {
	
  }
}
if (!function_exists('register_rest_route')) {
  function register_rest_route() {
	
  }
}
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

// TEST
         
$id = 1;

$posts = \digices\wpdb\Posts::shared();

$rows = $posts->fetchRowsByColumn('id',1);

if (count($rows) > 0) {

  $row = $rows[0];

  $post_meta = \digices\wpdb\PostMeta::shared();

  $meta_rows = $post_meta->fetchRowsForPostId($id);

  foreach ($meta_rows as $meta_row) {
    $k = $meta_row['meta_key'];
    $v = $meta_row['meta_value'];
    if ($data = @unserialize($v)) {
      $row[$k] = $data;
    } else {
      $row[$k] = $v;
    }
  }

  print_r($row);

}
