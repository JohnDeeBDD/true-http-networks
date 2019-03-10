<?php

namespace TrueHttpNetworks;

class AdminPageSendMessageFormListener{
    
    public function listen(){
        if(isset($_POST['send-message'])){
            $this->putSubmissionIntoMessageCPT();
        }
    }
    
    public function putSubmissionIntoMessageCPT(){

            //$NetworkID = $_POST['outbound-message-network-id'];
            //$this->auth = get_post_meta( $NetworkID, 'auth', TRUE);  
            //$this->Url  = get_post_meta( $NetworkID, 'Url', TRUE);  
            $post_data = array(
                'post_title' => $_POST['outbound-message-title'],
                'post_content' => $_POST['outbound-message-body'],
                'post_type' => 'message',
            );
            $post_id = wp_insert_post( $post_data );
    }
}