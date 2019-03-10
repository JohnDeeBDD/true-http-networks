<?php

namespace TrueHttpNetworks;

class MessageSender{
    
    public $message;
    public $sender;
    public $password;
    public $title;
    public $auth;
    public $Url;
    
    public function listenForFormSubmission(){
        if(isset($_POST['send-message'])){
            $this->sender = site_url();
            $this->message = $_POST['outbound-message-body'];
            $this->title = $_POST['outbound-message-title'];
            $NetworkID = $_POST['outbound-message-network-id'];
            $this->auth = get_post_meta( $NetworkID, 'auth', TRUE);  
            $this->Url  = get_post_meta( $NetworkID, 'Url', TRUE);  
            $this->sendMessage();
        }
    }
 
    
    public function sendMessage(){
        $args['randomString'] = $this->randomString(7);
        $args['message'] = $this->message;
        $args['sender'] = $this->sender;
        $args['title'] = $this->title;
        $args['auth'] = $this->auth;
        $args['Url'] = $this->Url;
        wp_schedule_single_event( time(),'send-thn-message', $args);
        spawn_cron();
    }
    
    private function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
            $rand = mt_rand(0, $max);
            $str .= $characters[$rand];
        }
        return $str;
    }
    
    public function remotePostMessageToReceiverUrl($randomString, $message, $sender, $title, $authCode, $Url){
        
        $headers = array (
            'Authorization' => 'Basic ' . base64_encode( 'admin' . ':' . $authCode ),
        );
        
        $data = array(
            'thn-title' => $title,
            'thn-message' => $message,
            'thn-sender' => $sender,
        );
        
        $response = wp_remote_post(
            $Url,
            array (
                'method'  => 'POST',
                'headers' => $headers,
                'body'    =>  $data
            )
        );
    }
}