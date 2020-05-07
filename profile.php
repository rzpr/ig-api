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
    echo json_encode(array("nama" => $nama));
    echo json_encode(array("bio" => $bio));
    echo json_encode(array("follower" => $follower));
    echo json_encode(array("following" => $following));
    echo json_encode(array("profile_pict_url" => $foto));

?>
