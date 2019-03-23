<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Api extends \Codeception\Module
{
    public function getResponse()
    {
        $response = $this->getModule('REST')->response;
        return $response;
    }
    
    public function showVariable($x){
        $vd = var_export($x, TRUE);
        $output = "The variable's value is $vd";
        throw new \Exception($output);
        return;
    }
    
    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
