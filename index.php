<?

require_once "main.php";

/**
 * Router
 *
 * @author    Yukky
 * @copyright 2018~ @Xere_Yukky
 * @license   MIT
 */
session_start();
date_default_timezone_set('Asia/Tokyo');
$s = new \RouteCheck();
$s->preg();
?>