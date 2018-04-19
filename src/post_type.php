<?php

/**
  * @package   digices/wpdb
  * @module    post_type
  * @author    Roderic Linguri <rlinguri@digices.com>
  * @copyright Digices LLC
  * @version   0.0.2
  */

namespace digices\wpdb;

class PostType
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

  /** @method constructor **/
  public function __construct()
  {
    $this->values = array('none','acf-field','acf-field-group','advanced_pricing','attachment','carousel','dlm_download_version','follow_up_email','gf_entry_to_comments','gravityview','ignitewoo_event','mc4wp-form','nav_menu_item','oembed_cache','page','post','postman_sent_mail','press','product','product_variation','projects','revision','scheduled-action','shop_coupon','shop_order','shop_order_refund','shop_subscription','ticket-meta-fieldset','tribe_events','tribe_organizer','tribe_rsvp_attendees','tribe_rsvp_tickets','tribe_venue','tribe_wooticket','wo_client');
  } // ./construct

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

} // ./PostType
