  <?php

  // print_r($_GET["hub_challenge"]);


  // $input = file_get_contents("php://input");
  // error_log(print_r($input, TRUE));
  
  file_put_contents("test.txt", file_get_contents("php://input"));

  $content = file_get_contents("test.txt");

  $content = json_decode($content);
  
  $rid = $content->entry[0]->messaging[0]->optin->user_ref;


  $token = "EAAKmgZC6V6F4BADlyZB01tTnvlXGA9WIrEZCZAqJNWurIP4Wj8MaD7TLwTyXRPwUdypuZAd1M2gbQnV6NHpGDAsNh9TDr4EA6cJfsy7yAoVSYfgVhBMBT7aKfkDIn0PMI8Q8Cz85Wj6ZACN0ZAXHHHDeJ8uE8B8vpbZCFV1o1UdOaHdPPGGlgPm2";
  // long lived
  // EAAKmgZC6V6F4BAIscugtLXycUzQHA2vd47Xms0H9vSBxNaOuK16wVodZBbG9uuuLqrQxCjN9fZCKXjOgUcUfUhZB5v042F1zqAKprOm8yAkvhwgrHCn0oAsiXC47oC7oy5lufukyaTxcbUEk0F8vpkpxhwCghVYZD
  
  $data = array(
    'recipient'=> array('user_ref'=> "$rid"),
    'message' => array('text'=> "Hi from our website")
  );
 

  $options = array(
    'http' => array(
      'method' => 'POST',
       'content' => json_encode($data),
       'header' =>  "Content-Type: application/json\n"
    )
  );
  

  $context = stream_context_create($options);

  file_get_contents("https://graph.facebook.com/v2.6/me/messages?access_token=$token",false, $context);




  ?> 
