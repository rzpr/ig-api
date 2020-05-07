<?php


    $url = $_GET['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/p/'.$url.'/?__a=1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    $profile = json_decode($output, true);
    $img_url = $profile["graphql"]["shortcode_media"];
    $img = $img_url["display_url"];
$data = array(
    'video_url' => $img
);
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
echo $jsonfile;    

?>
