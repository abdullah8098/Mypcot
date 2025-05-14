<?php
namespace App\Traits;

trait PushNotification{


    public function send_notification($request, $fcm_token, $user_type = 1) {

        $credentialsFilePath = "firebase/fcm.json";
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');
        $apiurl = 'https://fcm.googleapis.com/v1/projects/instacloak-androapps/messages:send';
        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();
        $access_token = $token['access_token'];
        
        $headers = [
            "Authorization: Bearer $access_token",
            'Content-Type: application/json'
        ];

        $test_data = [
            "title" => $request['title'],
            "body" => $request['body'],
            "user_type" => (string)$user_type,
        ]; 
        
        $data['data'] =  $test_data;
    
        $data['token'] = $fcm_token; // Retrive fcm_token from users table
    
        $payload['message'] = $data;

        $payload = json_encode($payload);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiurl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_exec($ch);
        $res = curl_close($ch);
        
        return $res;

    }
}