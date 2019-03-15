<?php 
  
require "libs/rb.php";
 R::setup('mysql:host=localhost;dbname=dambcool',
        'root', '123');

 session_start();