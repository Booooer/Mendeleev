<?php
  $mysql = mysqli_connect('localhost','root','','short_url');
  // Приём данных json
  $json = file_get_contents("php://input");
  $data = json_decode($json, true);

  $link = htmlspecialchars($data['url']);

  if(empty($link)){
    die('Field is empty');
  }
  else{
    $select = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT * FROM `links` WHERE `url` = '$link'"));
    if($select){
        $answer = [
            'url'  => $select['url'],
            'key'  => $select['short_key'],
            'link' => 'http://'.$_SERVER['HTTP_HOST'].'/-'.$select['short_key']
        ];
        echo $answer['link'];
    }
    else{
        /*---Генерация рандомного ключа для ссылки из публичного досутпа---*/
        $letters = 'qwertyuiopasdfghjklzxcvbnm1234567890';
        $count = strlen($letters);
        $intval = time();
        $result='';
        for($i=0;$i<4;$i++) {
            $last=$intval%$count;
            $intval=($intval-$last)/$count;
            $result.=$letters[$last];
        }
        /*---------------------------*/
        mysqli_query($mysql, "INSERT INTO `links` (`id`, `url`, `short_key`) VALUES (NULL, '$link', '".$result.$intval."') ");


        $select = mysqli_fetch_assoc(mysqli_query($mysql, "SELECT * FROM `links` WHERE `url` = '$link'"));
        if($select){
            $answer = [
                'url'  => $select['url'],
                'key'  => $select['short_key'],
                'link' => 'http://'.$_SERVER['HTTP_HOST'].'/-'.$select['short_key']
            ];
            echo $answer['link'];
        }
    }
}
exit();
?>
