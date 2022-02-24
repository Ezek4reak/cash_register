<?php
/**
 * Created by PhpStorm.
 * User: Ezekiel
 * Date: 02-May-18
 * Time: 10:40 AM
 */
    class App{

        /**
         * @param $message
         */
        public static function setMsg($text, $type){
            if($type == 'error'){
                $_SESSION['errorMsg'] = $text;
            } else {
                $_SESSION['successMsg'] = $text;
            }
            $_SESSION['errorType'] = $type;
        }

        public static function display(){
            if(isset($_SESSION['errorMsg'])){
                echo '<div class="alert alert-danger alert-dismissible" style="text-align: center; font-weight: bold">'.$_SESSION['errorMsg'].'</div>';
                unset($_SESSION['errorMsg']);
            }

            if(isset($_SESSION['successMsg'])){
                echo '<div class="alert alert-success alert-dismissible" style="text-align: center; font-weight: bold">'.$_SESSION['successMsg'].'</div>';
                unset($_SESSION['successMsg']);
            }
        }

        public static function msgType(){
            if(isset($_SESSION['errorType']) && $_SESSION['errorType']=='error'){
                echo '<h1>Error!!!</h1>';
                unset($_SESSION['errorType']);
            }else{
                echo '<h1 style="color:#107ca8;">Success!!!</h1>';
                unset($_SESSION['errorType']);
            }
        }

        //function to format date for mysql date format
        public static function format_date($date){
            list($year, $month, $day) = explode("-", $date);
            $formated_date = $day."-".$month."-".$year;
            return $formated_date;
        }
    }