<?php 
  require "db.php";

   $data = $_POST;

  if( isset($data['do_signup']) )
   {
    $errors = array();
    if( trim($data['login']) == '' )
    {
      $errors[]='Enter the login!';
    }

    if( trim($data['email']) == '' )
     {
      $errors[]='Enter the email!';
    }
     if( $data['password'] == '' )
    {
      $errors[]='Enter the password!';
    }
    if( $data['password_2'] != $data['password'] )
    {
      $errors[] = 'Passwords are not the same.Please try again!';
    }
    if( empty($errors) )
    {
      // все добре реєструєм
      $user = R::dispense('users');
      $user->login = $data['login'];
      $user->email = $data['email'];
      $user->password = password_hash( $data['password'], PASSWORD_DEFAULT);
      R::store($user);
      echo '<div style="color:green;">You are successfully registered tap to <a style="text-decoration: none;
       color:#F7F7FA;
       font-weight:900;" href="/">come back</a></div><hr>';
    }else
    {
    echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
   }
 ?>
  <!DOCTYPE html!>
<html>
   <head>
      <title>Damb Sing Up</title>
      <link href="style.css" rel="stylesheet" type="text/css"/> 
   </head>
   <body>
   <form action="/signup.php" class="block_signup" method="POST">
      <p class="user_name_signup">Login</p>
      <input type="text" name="login" value="<?php echo @$data['login'];?>">
      <p class="p_email_signup">Email</p>
      <input  type="email" name="email" value="<?php echo @$data['email'];?>">
      <p class="p_password_signup">Password</p>
      <input  type="password" name="password" value="<?php echo @$data['password'];?>">
      <p class="p_password2_signup">Ente the password again</p>
      <input type="password" name="password_2" value="<?php echo @$data['password_2'];?>"><br></br>
       <button type="submit" name="do_signup" class="button_signup" ><a  class="a_signup">Sign up</a></button></br></br>
    </form>    
 </body>
</html>


  