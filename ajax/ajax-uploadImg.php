<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp', 'pdf', 'doc', 'ppt'); // valid extensions
$path =  __DIR__ . '/../assets/uploads/'; // upload directory

if ($_FILES['photo']) {
   $img = $_FILES['photo']['name'];
   $tmp = $_FILES['photo']['tmp_name'];

   // get uploaded file's extension
   $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));

   // can upload same photo using rand function
   $final_image = rand(1000, 1000000) . '_' . date('Y_m_d') . $img;

   // check's valid format
   if (in_array($ext, $valid_extensions)) {
      $path = $path . strtolower($final_image);

      if (move_uploaded_file($tmp, $path)) {
         // echo "<img src='$path' />";
         // $name = $_POST['name'];
         // $email = $_POST['email'];

         //include database configuration file
         // include_once 'db.php';

         //insert form data in the database
         // $insert = $db->query("INSERT uploading (name,email,file_name) VALUES ('".$name."','".$email."','".$path."')");

         echo 'ok';
      }
   } else {
      echo 'invalid';
   }
}
