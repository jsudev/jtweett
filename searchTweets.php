<?php
showTweets("GeekyTheory",5);
                    
function getJsonTweets($query,$num_tweets){
        ini_set('display_errors', 1);
        require_once('TwitterAPIExchange.php');
 
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "2282799211-CRzVkglvx36PXwQ0EGC1utwwFs678Osxotn2CEl",
            'oauth_access_token_secret' => "wKXcaIHTMMxL6gOXRd2NTvP6rOxIcUg64aWRUIQEesKc7",
            'consumer_key' => "NNNV5Fj9T0lo134eLHkTuNuid",
            'consumer_secret' => "8shGHkaVLlyd6DVf4XJVqxoFFNnMC32M1z2VdLD42ODCrLMcb8"
        );
        
        if($num_tweets>100) $num_tweets = 100;
       
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = '?q='.$query.'&count='.$num_tweets;
 
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $json =  $twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        return $json;
}
