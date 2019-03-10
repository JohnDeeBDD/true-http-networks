<?php

namespace TrueHttpNetworks;

class ListOfNetworks{ 
    public function echoListOfNetworksDropdown(){
        //die("echoListOfNetworksDropdown echoListOfNetworksDropdown echoListOfNetworksDropdown echoListOfNetworksDropdown");
        $output = '<select id = "outbound-message-network-id" name = "outbound-message-network-id">';
        $network_args = array(
            'post_type' => 'network',
        );
        $custom_query = new \WP_Query($network_args);
        $num = wp_count_posts( 'network' )->draft;
        if ($num > 0){
            while($custom_query->have_posts()) : $custom_query->the_post();
            $ID = get_the_ID();
            $name = get_the_title();
            $output = $output . "<option value='" . $ID . "'>" . $name . "</option>";
            endwhile;
            $output = $output . "</select>";
            echo ($output);
            wp_reset_postdata(); // reset the query
        }else{
            echo("There are no networks.");
        }
    }
    
    public function returnArrayOfNetworkSlugs(){
        //return (["localhost", "General Chicken", "AWS"]);
        $output = array();
        $network_args = array(
            'post_type' => 'network',
            'post_status' => 'draft',
        );
        $custom_query = new \WP_Query($network_args);
        $num = wp_count_posts( 'network' )->draft;
        //die("COUNTING POSTS $num");
        //if (1==1){
        if ($num > 0){
            //return $num;
            //$output = "57";
            while($custom_query->have_posts()){
                //$output = "59";
                $custom_query->the_post();
                $name = get_the_title();
                array_push($output, $name);
            };
            
            //wp_reset_postdata(); // reset the query
            return $output;
        }else{
           return FALSE;
        }
    }
}