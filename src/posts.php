<?php

/**
  * @package   digices/wpdb
  * @module    posts
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Digices LLC
  * @version   0.0.2
  */

namespace digices\wpdb;

class Posts extends \digices\sqlayr\Table {

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
    $this->name = $wpdb->prefix.'posts';
    $this->columns = array('ID','post_author','post_date','post_date_gmt','post_content','post_title','post_excerpt','post_status','comment_status','ping_status','post_password','post_name','to_ping','pinged','post_modified','post_modified_gmt','post_content_filtered','post_parent','guid','menu_order','post_type','post_mime_type','comment_count');
    parent::__construct();
  } // ./__construct

  /**
    * @method fetch rows greater than id
    * @param  integer
    * @return array of assocs | bool
    */
  public function fetchRowsGreaterThanId($id)
  {
    $sql = "SELECT * FROM `".$this->name."` WHERE `ID` > ".($id - 1).";";
    if ($res = $this->database->fetch($sql)) {
      return $res;
    } else {
      $this->error = $this->database->error;
      return false;
    }
  } // ./fetchRowsGreaterThanId

  /**
    * @method last id
    * @return integer
    */
  public function lastId()
  {
    $sql = "SELECT max(ID) FROM ".$this->name.";";
    if ($res = $this->database->fetch($sql)) {
      if (count($res) > 0) {
        return intval($res[0]['ID']);
      }
    }
    return 0;
  } // ./lastId

} // ./Posts
