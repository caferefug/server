<?php
//namespace Xere;

require "define.php";
require "route.php";
/**
 * Router
 *
 * @author    Yukky
 * @copyright 2018~ @Xere_Yukky
 * @license   MIT-LiCENSE
 * 
 *
 * routes[1] = Action
 * routes[2] = Shop Name
 * routes[3] = Shop Access Key
 * routes[4] = Clerk IDm
 */
class RouteCheck
{

        function preg(){
                $URL = $_SERVER['REQUEST_URI'];
                list ($routes,$count) = route($URL);
                if ($routes[1] == "feedback") {
                        
                }elseif ($routes[1] == "public") {

                }
                else{
                        dead(404);
                        return true;
                }
                return true;
        }

        function insert_db()
        {

        }
}

?>