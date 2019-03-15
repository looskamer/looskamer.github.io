<?php 
  
require "libs/rb.php";
 R::setup('mysql:host=localhost;dbname=dambcool',
        'root', '123');
 $var=$_REQUEST["txtIn"]; 

 session_start();