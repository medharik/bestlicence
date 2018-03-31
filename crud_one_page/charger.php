<?php 
extract($_POST);//$libelle
extract($_FILES['photo']);//$name , $tmp_name,...
move_uploaded_file($tmp_name, "images/".$name);

 ?>