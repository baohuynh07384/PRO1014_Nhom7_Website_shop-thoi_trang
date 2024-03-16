<?php

namespace App\Core;

class Sessions {

    protected $sessionID;
    
    public function __construct(){
        if( !isset($_SESSION) ){
            $this->init_session();
        }
        //session_start();
        //$this->sessionID = session_id();
    }
    
    public function init_session(){
        session_start();
    }
    
    public function set_session_id(){
        //$this->start_session();
        $this->sessionID = session_id();
    }
    
    public function get_session_id(){
        return $this->sessionID;
    }
    
    public function session_exist( $session_name ){
        if( isset($_SESSION[$session_name]) ){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function create_session( $session_name , $is_array = false ){
        if( !isset($_SESSION[$session_name])  ){
            if( $is_array == true ){
                $_SESSION[$session_name] = array();
            }
            else{
                $_SESSION[$session_name] = '';
            }
        }
    }
    
    public static function insert_value( $session_name , array $data ){
        if( is_array($_SESSION[$session_name]) ){
            array_push( $_SESSION[$session_name], $data );
        }
    }
    
    public static function display_session( $session_name ){
        echo $_SESSION[$session_name];
        self::remove_session($session_name);    
    }
    
    public static function remove_session( $session_name = '' ){
        if( !empty($session_name) ){
            unset( $_SESSION[$session_name] );
        }
        else{
            unset($_SESSION);
            //session_unset();
            //session_destroy();
        }
    }
    
    public function get_session_data( $session_name ){
        return $_SESSION[$session_name];
    }
    
    public function set_session_data( $session_name , $data ){
        $_SESSION[$session_name] = $data;
    }
    public static function addSession($index, $value){
        $_SESSION[$index] = $value;
        return $_SESSION[$index];
    }
    
    }