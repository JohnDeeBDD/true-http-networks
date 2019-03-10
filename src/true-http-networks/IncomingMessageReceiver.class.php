<?php

namespace TrueHttpNetworks;

class IncomingMessageReceiver{
    
    public function receiveMessage(){
        add_action('init', array($this, "doReceiveMessage"));
    }
    
    public function doReceiveMessage(){
        if(isset($_POST['thn-message'])){$message = $_POST['thn-message'];}else{$message = "No message.";}
        if(isset($_POST['thn-sender'])){$sender = $_POST['thn-sender'];}else{$sender = "No sender.";}
        if(isset($_POST['thn-title'])){$title  = $_POST['thn-title'];}else{$title = "No title.";}

        // Create object
        $my_post = array(
            'post_title'    => $title,
            'post_content'  => $message,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'     => 'message',
        );
        
        $ID =  \wp_insert_post( $my_post );


       // wp_set_post_categories( $ID, $categoryID);
        return $ID;
    }
}