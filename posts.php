<?php
require './partials/header.php';

if ($_POST){
    if(!empty($_POST["title"]) && !empty($_POST["post"])){

$conn = new dbconnector();
$query = $conn->newQuery('INSERT INTO posts (Title, Post, SubmittedBy) VALUES (:Title, :Post, :SubmittedBy)');

                    $title = ($_POST['title']);
                    $post = ($_POST['post']);

                    $query->bindParam(":Title",$title);
                    $query->bindParam(":Post",$post);
                    $query->bindParam(":SubmittedBy",$_SESSION['id']);

        if($query->execute()){
                echo "<div class='alert alert-success' role='alert'>Din besked er lagt op</div>";
            }else{
                die("<div class='alert alert-danger' role='alert'>Kunne ikke poste din besked</div>");
            }
    }
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>

<form action="posts.php" method="post">
    <input type="text" name="title" placeholder="Overskrift"><br>
    <textarea name="post" id="post" placeholder="Skriv din besked her..." cols="30" rows="10"></textarea>
    <button type="submit">Post din besked</button>
</form>
<?=require './partials/footer.php';?>
</body>
</html>
