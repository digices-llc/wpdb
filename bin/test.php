<?php

/**
  * @package   digices/wpdb
  * @module    test
  * @author    Roderic Linguri <linguri@digices.com>
  * @copyright 2018 Digices LLC
  * @version   0.0.1
  */

require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'autoload.php';

echo 'Classes:'.PHP_EOL;

print_r(get_declared_classes());

echo 'Constants:'.PHP_EOL;

print_r(get_defined_constants());

echo 'Functions:'.PHP_EOL;

print_r(get_defined_functions());