<?php

$formMessage = "Let me know when The Various Directory launches!";

$email =  filter_input(INPUT_POST,"your_email",FILTER_VALIDATE_EMAIL);
if ($type==null){
  $type="user";
} else {
  $type = filter_input(INPUT_POST,"type");
}


if (!empty($_POST)){
  //if something has been posted
  require('includes/connection.php');

  try{
    $sql = "INSERT INTO prelaunch_users(email,type) VALUES(?,?)";
    $results = $db->prepare($sql);
    $results->bindParam(1, $email, PDO::PARAM_STR);
    $results->bindParam(2, $type, PDO::PARAM_STR);
    $results->execute();

    $formMessage = "Thanks for registering your interest! We'll let you know as soon as we're up and running!";
  } catch (Exception $e) {
      echo $e->getMessage();
  }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>The Various - Coming Soon</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
  </head>
  <body>
    <main>
      <img class="main-image" src="img/image.png"/>
      <div class="email-signup">
        <h2><?= $formMessage?></h2>
        <?php if (empty($_POST)){ ?>
        <form method="POST">
          <div class="form-group checkbox-group">
            <input type="checkbox" class="largerCheckbox" id="business" name="type" value="business">
            <label for="business">I am a business interested in being listed on The Various</label>
          </div>
          <div class="form-group form-group-email">
            <label for="your_email">Email</label>
            <input type="email" name="your_email" id="your_email" required/>
            <input class="submit-button" type="submit" value="GO">
          </div>
        </form>
        <?php } ?>
      </div>
      <div class="social-media">
        <a href="https://www.facebook.com/thevarious.com.au/"><img src="img/facebook.svg"/></a>
        <a href="https://www.instagram.com/thevarious.com.au/"><img src="img/instagram.svg"/></a>
      </div>
    </main>
  </body>
</html>
