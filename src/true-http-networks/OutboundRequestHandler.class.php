<?php

namespace TrueHttpNetworks;

class OutboundRequestHandler{
    
    public function __construct(){
        
        if(isset($_POST['outbound-url'])){
            
            update_option('transient-admin-incoming-http-network-requests', $_POST['outbound-url'] );
            
        }
        
    }
    
}