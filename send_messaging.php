<?php

require "serviceMessaging.php";


function sendPostRequest($url, $body, $authToken)
{

    $headers = [
        "Authorization: Bearer $authToken",
        "Content-Type: application/json", // يمكنك تعديل نوع المحتوى بحسب الحاجة
    ];


    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body)); // تحويل الجسم إلى JSON
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);


    $response = curl_exec($ch);


    if (curl_errno($ch)) {
        $error_msg = curl_error($ch);
        curl_close($ch);
        return "Error: $error_msg"; // إرجاع رسالة الخطأ في حال وجودها
    }


    curl_close($ch);


    return $response;
}



function sendGCM($title, $message, $token)
{


    $url = 'https://fcm.googleapis.com/v1/projects/messages-d0119/messages:send';


    $body = array(
        "message" => array(
            "token" => $token,
            "notification" => array(
                "title" => $title,
                "body" => $message
            ),

        )
    );

    $authToken = getAccessToken();
    sendPostRequest($url, $body, $authToken);
}
$tokne = "fhyZE8SlQh6eOqPBuUbyMl:APA91bEpJbLIdw05UrQRs5SC3UZKlUJ4jFGPEmEfMeQjZ8hbsnrWn_VJGSugbwWBsGR3p7Vx7rbra58bRIo-LlrejClhnxYYjGlL4n-XJrnuEwjCix9Ndlc";
 echo sendGCM("Hi", "hi from php api ", $tokne);
