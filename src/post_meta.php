<?php

/**
  * @package   digices/wpdb
  * @module    post_meta
  * @author    Roderic Linguri <linguri@digicess.com>
  * @copyright Digices LLC
  * @version   0.0.2
  */

namespace digices\wpdb;

class PostMeta extends \digices\sqlayr\Table {

  /** @property PostMeta (instance) **/
  protected static $shared;

  /** @method shared (PostMeta getter) **/
  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  } // ./shared

  /** @method constructor **/
  public function __construct()
  {
    $this->database = \digices\wpdb\Dbo::shared();
    global $wpdb;
    $this->name = $wpdb->prefix.'postmeta';
    $this->columns = array('meta_id','post_id','meta_key','meta_value');
    parent::__construct();
  } // ./__construct

  /**
    * @method fetch rows for post id
    * @param  integer
    * @return array of assocs | bool
    */
  public function fetchRowsForPostId($id)
  {
    $sql = "SELECT * FROM `".$this->name."` WHERE `post_id` = ".$id.";";
    if ($res = $this->database->fetch($sql)) {
      return $res;
    } else {
      $this->error = $this->database->error;
      return false;
    }
  } // ./fetchRowsForPostId

  /**
    * @method fetch meta for post id
    * @param  integer
    * @return assoc
    */
  public function fetchMetaForPostId($id)
  {
    $meta = array();
    if ($rows = $this->fetchRowsForPostId($id)) {
      foreach ($rows as $row) {
        $meta[$row['meta_key']] = $row['meta_value'];
      }
    }
    return $meta;
  }

} // ./PostMeta
