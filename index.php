<?php
/**
 *
 * Initializing
 *
 */

require_once 'Init.php';

/**
 *
 * Starting APP
 *
 */

$app = new Application();

/**
*
* Mode
*
*/

if (MODE == 'development') {
  error_reporting(E_ALL | E_STRICT);
  // phpinfo();

} elseif (MODE == 'production') {
  error_reporting(0);

}
