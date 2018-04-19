<?php

/**
  * @package   digices/wpdb
  * @module    dbo
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Digices LLC
  * @version   0.0.2
  */

/** Dbo **/

namespace digices\wpdb;

class Dbo extends \digices\sqlayr\Database
{

  /** @property Dbo (instance) **/
  protected static $shared;

  /** @method shared (Dbo getter) **/
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
    $this->host = DB_HOST;
    $this->name = DB_NAME;
    $this->user = DB_USER;
    $this->pass = DB_PASSWORD;
    parent::__construct();
  } // ./__construct

} // ./Dbo
