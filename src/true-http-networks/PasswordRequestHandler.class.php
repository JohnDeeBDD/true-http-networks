<?php

namespace TrueHttpNetworks;

class PasswordRequestHandler{
    
    private $apiRouteName = 'true-http-networks';
    private $apiEndpointName = "/new-password-request";
        
    public function registerApiRoute(){
        register_rest_route(
            $this->apiRouteName,
            $this->apiEndpointName,
                array(
                    'methods' => \WP_REST_Server::CREATABLE,
                    'callback' => array(
                        new \TrueHttpNetworks\PasswordRequestResponder,
                        'handleIncomingFirstPasswordRequest',
                    ),
                    //anyone can do this action
                    'permission_callback' => function(){return true;},
                )
        );
    }
}
/*
    $character = json_decode($data);
Now we can access it as a PHP object.

echo $character->name;
*/