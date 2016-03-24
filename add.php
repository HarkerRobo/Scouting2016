<?php
$file_contents = implode(",", $_POST);
if(file_exists($_FILES["picture"]["tmp_name"]) &&  is_uploaded_file($_FILES["picture"]["tmp_name"]) && $_FILES["picture"]["error"] == 0) {
    $file_name = md5(basename($_FILES["picture"]["name"]));
    move_uploaded_file($_FILES["picture"]["tmp_name"], "./images/".$file_name);
    $file_contents = $file_contents.","."./images/".$file_name."||";
}
$file_contents = $file_contents."||";
file_put_contents("data.txt", $file_contents, FILE_APPEND);
?>
<!doctype html>
<html>
    <head>
        <title>1072 Scouting</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <div class="col-md-9">
                <a href="index.php">go back</a>
                <a href="data.php">view data</a>
            </div>
        </div>
        <footer>
            Made by Ashwin Reddy
        </footer>
    </body>
</html>
