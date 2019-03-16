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
                echo "OK1";
                $URL = $_SERVER['REQUEST_URI'];
                list ($routes,$count) = route($URL); // http://trunk-hackathon.herokuapp.com/feedback/tero_id/user_id/type
                if ($routes[1] == "feedback") {
                        if (insert_feedback($routes[2], $routes[3], $routes[4])) {
                                echo "Done";
                        }else{
                                echo "Error";
                        }
                }elseif ($routes[1] == "public") {
                        echo "Doing";
                        $item = history($routes[2],$routes[3]);
                        echo $item;
                        echo "Done";
                }
                else{
                        dead(404);
                        return true;
                }
                return true;
        }
}

?>