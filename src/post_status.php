<?php

/**
  * @package   digices/wpdb
  * @module    post_status
  * @version   0.6.3
  * @author    Roderic Linguri <linguri@digices.com>
  * @copyright Digices LLC
  */

namespace digices\wpdb;

class PostStatus
{

  /** @property integer **/
  public $id;
  
  /** @property string **/
  public $value;

  /** 
    * @method  constructor
    * @param   integer | string | null
    * NOTE: passing null or nothing constructs a 'None' level
    */
  public function __construct()
  {

    $values = array('none','auto-draft','draft','failed','fue-active','fue-archived','fue-inactive','future','inherit','pending','preview','private','publish','trash','wc-active','wc-cancelled','wc-completed','wc-failed','wc-on-hold','wc-partial-payment','wc-pending','wc-pending-cancel','wc-pending-deposit','wc-refunded');

    // create default values
    $this->id = 0;
    $this->value = 'none';
    
    // attempt to set from args
    $args = func_get_args();
    
    if (count($args) > 0) {
    
      // only need the first arg
      $arg = $args[0];

      if (is_numeric($arg)) {
        if (count($values) > $arg) {
          $this->id = intval($arg);
          $this->value = $values[$this->id];
        } // ./we have enough values for the integer to make sense as an id
      } // ./arg is numeric
      
      else {

        $i = 0;

        foreach ($values as $value) {
          if ($value == $arg) {
            $this->value = $arg;
            $this->id = $i;
          }
          $i++;
       } // ./foreach

      } // ./arg is not numeric
      
    } // ./have args

  } // ./__construct

} // ./PostStatus
