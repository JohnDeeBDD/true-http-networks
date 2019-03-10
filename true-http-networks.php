<?php
/*
 Plugin Name: True HTTP Networks
 Plugin URI: https://generalchicken.net/true-http-networks/
 Description: 
 Version: 1.0
 Author: John Dee
 Author URI: https://generalchicken.net
 */

namespace TrueHttpNetworks;

require_once (plugin_dir_path(__FILE__). 'src/true-http-networks/autoloader.php');
//use \PHPUnit\Framework\TestCase;
//throw new \PHPUnit_Framework_SkippedTestError('This test is skipped');
$Plugin = new Plugin();
$Plugin->setupCustomPostTypes();
$Plugin->setupCategories();
$Plugin->addAdminPage();
$Plugin->listenForIncomingHttpMessage();
$Plugin->listenForPasscodeRequest();
//$Plugin->processActionStack();
//it should have an auth code for each acceptable network
//it should create an auth code
//it should accept auth codes when on the plugin admin pag

//creates an action hook for the cron job to hit:
add_action( 'send-thn-message', array(new MessageSender, 'remotePostMessageToReceiverUrl'), 10, 6);

/*
//ACTIVATION AND DEACTIVATION:
function activatePlugin() {
    update_option('deactivateGdprCommentFieldFeature', FALSE);
    update_option('gdpr-comment-opt-in', TRUE);
}
register_activation_hook( __FILE__, 'RemoveGDPR\activatePlugin' );
function deactivatePlugin() {
    delete_option('deactivateGdprCommentFieldFeature');
    delete_option('gdpr-comment-opt-in');
}
register_deactivation_hook( __FILE__, 'RemoveGDPR\deactivatePlugin' );
*/