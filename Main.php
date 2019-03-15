<?php
  $data = $_POST;
  if(isset($data['do_login']))
  {
    $errors =array();
    $user = R::findOne('users','email=?',array($data['email']));
    if($user)
    {
      // логін існує
      if(password_verify($data['password'],$user->password) )   
       {
        $_SESSION['logged_user'] = $user;
        echo '<div style="color:green;">You are successfully loged tap to arried in <a style="text-decoration: none;
       color:#F7F7FA;
       font-weight:900;" href="/Home page.php">Home page!</a></div><hr>'; 
     }else
      {
        $errors[]='Incorectly entered password!';
      }
    } else
    {
      $errors[]='User with this login is not found!';
     }
     if( ! empty($errors) )
    {
     echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
  }

  
?>
<!DOCTYPE html!>
<html>
   <head>
      <title>Damb</title>
      <link href="style.css" rel="stylesheet" type="text/css"> 
   </head>
   <body>
     
   	<form action="/" method="POST" class="form_login">
   		<p class="p_email">Email</p>
   	<input type="text" name="email" value="<?php echo @$data['email']; ?>"></input>
   	<p class="p_password">Password</p>
   	<input type="password" name="password" value="<?php echo @$data['password']; ?>"></input>
   	<button type=submit name="do_login" class="button_login" ><a  class="a_login">Log in</a></button></br>
  	<a href="signup.php" class="a_signup">Sing up</a>
   	</form>
<script>
  
</script>
   </body>
</html>