<?php

namespace TrueHttpNetworks;

class Plugin{
    
    public function setupCustomPostTypes(){
        $CustomPostTypes = new CustomPostTypes();
        add_action( 'init', array($CustomPostTypes, 'registerMessagesCpt') );
        add_action( 'init', array($CustomPostTypes, 'registerNetworksCpt') );
    }
    
    public function setupCategories(){
        $outboundID = wp_insert_term(
            'outbound',
            'category',
            array(
                'description' => 'This is an outbound message.',
                'slug'        => 'outbound'
            )
        );
    }
    
    public function listenForIncomingHttpMessage(){
        add_action( 'rest_api_init', array (new ApiRouteRegistrar(), 'registerWhitelistRoutes'));
    }
    
    public function listenForPasscodeRequest(){
        add_action( 'rest_api_init', array (new PasswordRequestHandler(), 'registerApiRoute'));
    }
    
    public function addAdminPage(){
        //launches the admin menu page:
        add_action(
            'admin_menu', 
            function(){
                add_menu_page(
                    'True HTTP Networks',
                    'True HTTP Networks',
                    'manage_options',
                    'true-https-networks',
                    function (){
                        include_once(plugin_dir_path(__FILE__) . 'true-http-networks-admin-page.php');
                    }
                );
            }
        );
    }
}