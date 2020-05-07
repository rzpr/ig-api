<?php
    
    $url = $_GET['username'];
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, 'https://www.instagram.com/'.$url.'/?__a=1');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch); 
    curl_close($ch);      
    $profile = json_decode($output, true);
    $nama = $profile["graphql"]["user"]["full_name"];
    $bio = $profile["graphql"]["user"]["biography"];
    $follower = $profile["graphql"]["user"]["edge_followed_by"]["count"];
    $following = $profile["graphql"]["user"]["edge_follow"]["count"];
    $foto = $profile["graphql"]["user"]["profile_pic_url_hd"];
$data = array(
    'full_name'     => $nama,
    'bio'   => $bio,
    'follower' => $follower,
    'following' => $following,
    'pict_url' => $foto
);
$jsonfile = json_encode($data, JSON_PRETTY_PRINT);
echo $jsonfile;

?>
