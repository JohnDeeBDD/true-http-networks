<?php

namespace TrueHttpNetworks;

class PasswordRequestResponder{
    
    public function handleIncomingFirstPasswordRequest(){
        if(!($this->dataIsValid())){
            return "There has been an error.";
        }
        $networkName = $_POST['network-name'];
        $networkUrl = $_POST['network-url'];
        require_once( ABSPATH . 'wp-admin/includes/post.php' );
        $ID = \post_exists($networkName);
        if ($ID == 0){
            $networkCPT = array(
                'post_title'    => $networkName,
                //'post_content'  => $log,
                'post_status'   => 'draft',
                'post_author'   => 1,
                'post_type'     => 'network',
            );
            $ID = wp_insert_post( $networkCPT );
        }
        $generatedPassword = $this->returnFirstPassword();
        //$this->storeGeneratedPassword($generatedPassword);
        update_post_meta( $ID, "URL", $_POST['network-url']);
        update_post_meta($ID, "password", $generatedPassword);
        $poddata = get_post_meta($ID, 'password');
        return $generatedPassword;
    }
    
    private function dataIsValid(){
        //to do
        return true;
    }
    private function storeGeneratedPassword($password){
        $networkName = $_POST['network-name'];
        $networkUrl = $_POST['network-url'];
        
        $my_post = array(
            'post_title'    => $networkName,
            //'post_content'  => $log,
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => 'network',
        );
        $ID = wp_insert_post( $my_post );
        
       
    }
    
    public function returnFirstPassword(){
        $password = array ('password' => $this::generateRandomString(15));
        return $password;
    }
    
    
    
    private static $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    private static $string;
    private static $length = 15; //default random string length
    
    public static function generateRandomString($length = null){
        
        if($length){
            self::$length = $length;
        }
        
        $characters_length = strlen(self::$characters) - 1;
        
        for ($i = 0; $i < self::$length; $i++) {
            self::$string .= self::$characters[mt_rand(0, $characters_length)];
        }
        
        return self::$string;
        
    }
}