<?php
include 'connect.php';
DBconnect();

if ((!$_POST['articleTitle']) || (!$_POST['articleBody']) || (!$_POST['articleAuthor']) || (!$_POST['articleDate'])) {
	header("Location: add.php");
	exit;
}

$articleTitle = mysqli_real_escape_string($connection, $_POST['articleTitle']);
$articleBody = mysqli_real_escape_string($connection, $_POST['articleBody']);
$articleAuthor = mysqli_real_escape_string($connection, $_POST['articleAuthor']);
$articleDate = mysqli_real_escape_string($connection, $_POST['articleDate']);

$articleId = mysqli_insert_id($connection);

$addArticlePostSql =  "INSERT INTO articles (articleTitle, articleBody, articleAuthor, articleDate) VALUES ('".$articleTitle ."','".$articleBody."', '".$articleAuthor."', '".$articleDate."')";

$addArticlePostRes = mysqli_query($connection, $addArticlePostSql) or die(mysqli_error($connection));

mysqli_close($connection);

$messageBlock = "<p>The <strong>".$_POST["articleTitle"]."</strong> article has been added.</p>";
?>
<!DOCTYPE html>
<html>
<head>
  <title>New Article Added</title>
</head>
<body>
  <h1>New Article Added</h1>
  <?php echo $messageBlock; ?>

  <p><a href="index.php">Article List</a></p>
</body>
</html>