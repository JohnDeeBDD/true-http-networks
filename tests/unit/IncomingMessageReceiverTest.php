<?php

namespace TrueHttpNetworks;

class IncomingMessageReceiverTest extends \Codeception\TestCase\WPTestCase{

	/**
     * @test
     * it should be instantiatable
     */
    public function itShouldBeInstantiable(){
    	$IncomingMessageReceiver = new IncomingMessageReceiver();
    }
    
    /**
     * @test
     * the CPTs should be active
     */
    public function itShouldHaveCpts(){
        $CustomPostTypes = new CustomPostTypes();
        $CustomPostTypes->registerMessagesCpt();
        //$CustomPostTypes->registerNetworksCpt();
        $my_post = array(
            'post_title'    => "Test Message",
            'post_content'  => "This is the message content.",
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'     => 'message',
        );
        $ID = wp_insert_post( $my_post );
        
        $postType = "post";
        $exists = post_type_exists($postType);
        $this->assertEquals(TRUE, $exists, "The CPT $postType does not exist");
        
        $postType = "page";
        $exists = post_type_exists($postType);
        $this->assertEquals(TRUE, $exists, "The CPT $postType does not exist");
        
        $postType = "message";
        $exists = post_type_exists($postType);
        $this->assertEquals(TRUE, $exists, "The CPT $postType does not exist");
    }

    /**
     * @test
     * is should create message 
     */
    public function testDoReceiveMessage(){
        $CustomPostTypes = new CustomPostTypes();
        $CustomPostTypes->registerMessagesCpt();
        //$CustomPostTypes->registerNetworksCpt();
        $givenTitle = "This is a test title. DELETE ME!";
        //tests that the title is the same
        $IncomingMessageReceiver = new IncomingMessageReceiver();
        $_POST['thn-message'] = "Some test message";
        $_POST['thn-sender'] = "Some sender.";
        $_POST['thn-title'] = $givenTitle;
        $ID = $IncomingMessageReceiver->doReceiveMessage();
        $returnedTitle = get_the_title( $ID );
        $this->assertEquals($givenTitle, $returnedTitle);
    }
}