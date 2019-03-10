<?php

namespace TrueHttpNetworks;

class AdminPageNetworkRequestHandler{
    
    public function listenForIncomingNetworkRequests(){
        if (isset($_POST['thn-inbound-network-request'])){
            $outbound_url = $this->sanatizeRequest($_POST['outbound_url']);
            $secrtMessage = $this->sanatizeRequest($_POST['secret-message']);
            if(get_option( "thn-admin-page-inbounds-transient" )){
                $inbounds = get_option( "thn-admin-page-inbounds-transient");
                if(!(is_array($inbounds))){die('something is wrong');}
                array_push($inbounds)
            }
        }
    }
    
    public function sanatizeRequest($request){
        return $request;
    }
    
}