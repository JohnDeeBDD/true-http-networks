<?php

namespace TrueHttpNetworks;

class ApiRouteRegistrar{
    
    private $listOfWhiteSites = array();

    private $apiRouteName = 'true-http-networks/message-incoming-from/';
  
    public function registerWhitelistRoutes(){
        //die("registerWhitelistRoutes");
        $ListOfNetworks = new ListOfNetworks();
        $this->listOfWhiteSites = $ListOfNetworks->returnArrayOfNetworkSlugs();
        //var_dump($this->listOfWhiteSites);die();
        if(is_array($this->listOfWhiteSites)){
        foreach($this->listOfWhiteSites as $whiteSite){
            //die("registerWhitelistRoutes $whiteSite");
            register_rest_route(
                $this->apiRouteName,
                $whiteSite,
                array(
                    'methods' => 'POST',
                    'callback' => 
                        array(
                            new \TrueHttpNetworks\IncomingMessageReceiver,
                            'receiveMessage',
                        ),
                    'permission_callback' => function () {
                        //todo!!
                        return true;
                        //return current_user_can( 'edit_others_posts' );
                    }
                )
            );
        }
        }
    }
}