<?php

namespace TrueHttpNetworks;

class InboundRequestHandler{
    
    private $inboundRequestItem = 
        array(
            'requestingNetworkName' => "localhost",
            'requestingNetworkUrl'  => "http://localhost/",
            'requestingNetworkID'   => "1",
            'secretMessage'         => "This is a secret message.",
            'inbound'               => "",
        );
        
    private $inboundRequestItemsCollection = array();
    
    public function checkIfTransientExistsCreateIfNot(){
        
    }
    
    public function __construct(){
        $a = $this->inboundRequestItemsCollection;
        $b = $this->inboundRequestItem;
        array_push($a, $b);  
        //var_dump($a);die();
        $this->inboundRequestItemsCollection = $a;
    }
   
    public function outputNetworkRequests(){
        
        $inbound = "Inbound";
 
        $inboundRequestItemsCollection = $this->inboundRequestItemsCollection;
        foreach($inboundRequestItemsCollection as $inboundRequestItem){
            $requestingNetworkID = $inboundRequestItem['requestingNetworkID'];
            $requestingNetworkUrl = $inboundRequestItem['requestingNetworkUrl'];
            $secretMessage = $inboundRequestItem['secretMessage'];

$output = <<<output
<tr>
    <th scope="row"><label for="">$inbound</label></th>
    <td>
        <input type = 'button' value = 'Accept' name = 'button-$requestingNetworkID' id = 'button-$requestingNetworkID' />
        $requestingNetworkUrl
        <p class="description" id="tagline-description">
            $secretMessage
        </p>
    </td>
</tr>
output;


        echo $output;
        $inbound = "";
        }
    }
}