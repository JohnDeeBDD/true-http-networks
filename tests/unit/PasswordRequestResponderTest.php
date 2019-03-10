<?php

namespace TrueHttpNetworks;

class PasswordRequestResponderTest extends \Codeception\TestCase\WPTestCase{

	/**
     * @test
     * it should be instantiatable
     */
    public function itShouldBeInstantiable(){
        $PasswordRequestResponder = new PasswordRequestResponder();
    }
    
    /**
     * @test
     * when the password is sent, it should be recorded in the network CPT
     */
    public function thePasswordShouldBeRecordedInANetworkCpt(){
        //given there are CPTs
        //and a message is received by the API
        $CustomPostTypes = new CustomPostTypes();
        $CustomPostTypes->registerMessagesCpt();
        
        $networkName = "test network";
        
        $CustomPostTypes->registerNetworksCpt();
        $my_post = array(
            'post_title'    => $networkName,
            //'post_content'  => $log,
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => 'network',
        );
        $ID = wp_insert_post( $my_post );
    }
}