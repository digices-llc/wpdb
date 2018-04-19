<?php

/**
  * @package   digices/wpdb
  * @module    test
  * @author    Roderic Linguri <linguri@digices.com>
  * @copyright 2018 Digices LLC
  * @version   0.0.2
  */

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'autoload.php';

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
