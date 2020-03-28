<?php
/**
 * Created by PhpStorm.
 * User: Chamtooni
 * Date: 3/19/2020
 * Time: 03:32
 */

require_once '../../private/init.php';
$title = 'logout page';
require_once SHARED_PATH . '/admin_header.php';

Admin::logout();


?>
