<?php

header('Content-Type: application/json; charset=UTF-8');
require 'TwistOAuth.phar';

$file = 'log.txt';

try {
    $to = new TwistOAuth('','','','');

    $TweetText = $_POST['text'];

    $to->post('statuses/update', array('status' => $TweetText." #VoiceTweet"));
    
    file_put_contents($file, 'Success : '.$TweetText."\n", FILE_APPEND | LOCK_EX);


} catch(TwistException $e){
    file_put_contents($file, 'Error   : '.$TweetText."\n", FILE_APPEND | LOCK_EX);
}