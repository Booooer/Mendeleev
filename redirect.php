<?php
  $mysql = mysqli_connect('localhost','root','','short_url');

  $key = htmlspecialchars($_GET['key']);
  if($key){
    $select = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT * FROM `links` WHERE `short_key` = '".$key."'"));
    if($select){
        $answer = [
            'url' => $select['url'],
            'key' => $select['short_key']
      ];
      // Сам редирект на оригинальную ссылку
      header('location: '.$answer['url']);
    }
  }
 ?>
