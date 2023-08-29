<?php
    	include 'connect.php';
        DBconnect();
    	$id=$_GET['id'];
    	$articleQuery=mysqli_query($connection,"select * from `articles` where id='$id'");
    	$Article=mysqli_fetch_array($articleQuery);
    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <title>Article Edit</title>
    </head>
    <body>
    	<h2>Edit</h2>
    	<form method="POST" action="updateArticle.php?id=<?php echo $id; ?>">
    		<label>Title:</label><input type="text" value="<?php echo $Article['articleTitle']; ?>" name="articleTitle">
    		<label>Body:</label><input type="text" value="<?php echo $Article['articleBody']; ?>" name="articleBody">
            <label>Author:</label><input type="text" value="<?php echo $Article['articleAuthor']; ?>" name="articleAuthor">
            <label>Date:</label><input type="date" value="<?php echo $Article['articleDate']; ?>" name="articleDate">
    		<input type="submit" name="submit">
    		<a href="index.php">Back</a>
    	</form>
    </body>
    </html>

