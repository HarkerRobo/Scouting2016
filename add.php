<?php
$file_name = md5(basename($_FILES["picture"]["name"]));
move_uploaded_file($_FILES["picture"]["tmp_name"], "./images/".$file_name);
$file_contents = implode(",", $_POST);
$file_contents = $file_contents.","."./images/".$file_name."||";
file_put_contents("data.txt", $file_contents, FILE_APPEND);
?>
<a href="index.php">go back</a>
