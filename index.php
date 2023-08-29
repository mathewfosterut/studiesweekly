<?php
include 'connect.php';
DBconnect();

$getArticleSql = "SELECT id, articleTitle, articleBody, articleAuthor, DATE_FORMAT(articleDate,  '%b %e %Y') as formatArticleDate FROM articles ORDER BY articleTitle DESC";
$getArticleRes = mysqli_query($connection, $getArticleSql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($getArticleRes) < 1) {
	$display_block = "<p><em>No articles exist.</em></p>";
} else {

    $display_block = <<<END_OF_TEXT
    <table id="myTable">
    <thead>
    <tr>
    <th>Id</th>
    <th>Title</th>
    <th>Body</th>
    <th>Author</th>
    <th>Date</th>
    <th>Update</th>
    <th>Delete</th>
    </tr>
    </thead>
    <tbody>
END_OF_TEXT;

	while ($articleInfo = mysqli_fetch_array($getArticleRes)) {
    $id = $articleInfo['id'];
		$articleTitle = $articleInfo['articleTitle'];
		$articleBody = $articleInfo['articleBody'];
    $articleAuthor = $articleInfo['articleAuthor'];
		$articleDate = $articleInfo['formatArticleDate'];

		$display_block .= <<<END_OF_TEXT
		<tr>
        <td>$id</td>
		    <td>$articleTitle</td>
		    <td>$articleBody</td>
        <td>$articleAuthor</td>
		    <td>$articleDate</td>
        <td><a href="editArticle.php?id=$id"">Edit</a></td>
        <td><a href="deleteArticle.php?id=$id">Delete</a></td>
		</tr>
END_OF_TEXT;
	}
	mysqli_free_result($getArticleRes);

	mysqli_close($connection);

    $display_block .= "</tbody>
	</table>";
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Articles List</title>
  <style type="text/css">
  	table {
  		border: 1px solid black;
  		border-collapse: collapse;
  	}
	th {
		border: 1px solid black;
		padding: 6px;
		font-weight: bold;
		background: #ccc;
	}
	td {
		border: 1px solid black;
		padding: 6px;
	}
	.num_posts_col { text-align: center; }
  </style>
  <script type="text/javascript">
  function sortTable(table, col, reverse) {
     var tb = table.tBodies[0];
     var tr = Array.prototype.slice.call(tb.rows, 0);
     var  i;
     reverse = -((+reverse) || -1);
     tr = tr.sort(function (a, b) {
       return reverse 
          * (a.cells[col].textContent.trim()
               .localeCompare(b.cells[col].textContent.trim())
             );
     });
     for(i = 0; i < tr.length; ++i) tb.appendChild(tr[i]);
   }
  </script>
</head>
<body>
  <h1>Articles List</h1>
  <?php echo $display_block; ?>
  <p>Would you like to <a href="addArticle.php">add a new article</a>?</p>
</body>
</html>
