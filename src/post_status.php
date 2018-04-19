<?php

/**
  * @package   digices/wpdb
  * @module    post_status
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Digices LLC
  * @version   0.0.2
  */

namespace digices\wpdb;

class PostStatus
{

  /** @property PostMeta (instance) **/
  protected static $shared;

  protected $values;

  /** @method shared (PostMeta getter) **/
  public static function shared()
  {
    if (!isset(self::$shared)) {
      self::$shared = new self();
    }
    return self::$shared;
  } // ./shared

  public function __construct()
  {
    $this->values = array('none','auto-draft','draft','failed','fue-active','fue-archived','fue-inactive','future','inherit','pending','preview','private','publish','trash','wc-active','wc-cancelled','wc-completed','wc-failed','wc-on-hold','wc-partial-payment','wc-pending','wc-pending-cancel','wc-pending-deposit','wc-refunded');
  }

  /**
    * @method integer from string
    * @param  string
    * @return integer
    */
  public function integerFromString($str)
  {
    $i = 0;
    foreach ($this->values as $value) {
      if ($value == $str) {
        return $i;
      }
      $i++;
    }
    return 0;
  } // ./integerFromString

  /**
    * @method integer from string
    * @param  string
    * @return integer
    */
  public function stringFromInteger($int)
  {
    if (isset($this->values[$int])) {
      return $this->values[$int];
    } else {
      return 'none';
    }
  } // ./integerFromString

} // ./PostStatus
