<?php

/**
  * @package   digices/wpdb
  * @module    post_type
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Digices LLC
  * @version   0.6.2
  */

namespace digices\wpdb;

class PostType
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

    $values = array('none','acf-field','acf-field-group','advanced_pricing','attachment','carousel','dlm_download_version','follow_up_email','gf_entry_to_comments','gravityview','ignitewoo_event','mc4wp-form','nav_menu_item','oembed_cache','page','post','postman_sent_mail','press','product','product_variation','projects','revision','scheduled-action','shop_coupon','shop_order','shop_order_refund','shop_subscription','ticket-meta-fieldset','tribe_events','tribe_organizer','tribe_rsvp_attendees','tribe_rsvp_tickets','tribe_venue','tribe_wooticket','wo_client');

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

} // ./PostType
