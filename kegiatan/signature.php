<?php
    $consid = "24396";
    $secretKey = "9iD76D2EB7"; 
    $userKey = "6c5941477939f737e59a1d74e2ac0f9e";

    date_default_timezone_set('UTC');

    $tStamp = strval(time()-strtotime('1970-01-01 00:00:00'));
    $signature = hash_hmac('sha256', $consid."&".$tStamp, $secretKey, true);
    $encodedSignature = base64_encode($signature);
    $urlencodedSignature = urlencode($encodedSignature);

    echo "X-cons-id  : " .$consid .""."<br>";
    echo "X-timestamp: " .$tStamp .""."<br>";
    echo "X-signature: " .$encodedSignature.""."<br>";
    echo "user_key: " .$userKey."<br>"."<br>";