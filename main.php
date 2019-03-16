<?php
//namespace Xere;

require "define.php";
require "route.php";
require "lib.php";
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
                list ($routes,$count) = route($URL); // http://trunk-hackathon.herokuapp.com/feedback/teroid/userid/type
                if ($routes[1] == "feedback") {
                        insert_feedback($routes[2], $routes[3], $routes[4]);
                }elseif ($routes[1] == "public") {

                }
                else{
                        dead(404);
                        return true;
                }
                return true;
        }

        function insert_feedback($teroid,$userid,$type)
        {

        }
}

?>