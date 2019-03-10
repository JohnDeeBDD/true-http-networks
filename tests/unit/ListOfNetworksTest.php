<?php

namespace TrueHttpNetworks;

class ListOfNetworksTest extends \Codeception\TestCase\WPTestCase{
    
    public $desiredPostType = "network";
    
    public function _before(){
        $CustomPostTypes = new CustomPostTypes();
        $CustomPostTypes->registerNetworksCpt();
    }

	/**
     * @test
     * it should be instantiatable
     */
    
    public function itShouldBeInstantiable(){
        $ListOfNetworks = new ListOfNetworks();
    }
    
    /**
     * @test
     * the list requires "networks" CPTs to works and be active
     */
    public function requiresNetworkCPTs(){
        $desiredPostType = $this->desiredPostType;
        $postTypes = get_post_types();
        $this->assertContains( $desiredPostType, $postTypes, "get_post_types isn't returing '$desiredPostType'");
    }
    
    /**
     * @test
     * test return Array Of Network Slugs
     * the ListOfNetworks class spits out the networks that the plugin can interact with
     */
    public function testReturnArrayOfNetworkSlugs(){
        $my_post = array(
            'post_title'    => "localhost",
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => $this->desiredPostType,
        );
        $ID = wp_insert_post( $my_post );
  
        $my_post = array(
            'post_title'    => "General Chicken",
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => $this->desiredPostType,
        );
        $ID = wp_insert_post( $my_post );

        $my_post = array(
            'post_title'    => "AWS",
            'post_status'   => 'draft',
            'post_author'   => 1,
            'post_type'     => $this->desiredPostType,
        );
        $ID = wp_insert_post( $my_post );
        
        $ListOfNetworks = new ListOfNetworks();
        $returnedArrayOfNetworkSlugs = $ListOfNetworks->returnArrayOfNetworkSlugs();
        
        $expectedResult = ["AWS", "General Chicken", "localhost"];
        $this->assertEquals($expectedResult, $returnedArrayOfNetworkSlugs);
}

}