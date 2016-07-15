<?php
/*
 * @name: Barmat MVC
 * @author: Bartłomiej Matlęga <bartlomiej.matlega95@gmail.com>
 */

/*
 *
 * COMPOSER
 *
*/

require __DIR__ . '/vendor/autoload.php';

/*
 *
 * CONFIGS
 *
 */

require_once 'config/database.php';

/*
 *
 * LIBS
 *
*/

require_once 'lib/application.php';
require_once 'lib/controller.php';
require_once 'lib/model.php';
require_once 'lib/view.php';
require_once 'lib/data.php';
require_once 'lib/definitions.php';
require_once 'lib/session.php';
require_once 'lib/cookie.php';
require_once 'lib/user.php';
require_once 'lib/message.php';
require_once 'lib/utilities.php';

/*
*
* MODELS
*
*/

require_once 'app/models/home.php';
