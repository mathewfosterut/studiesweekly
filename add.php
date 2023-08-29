<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Add an Article</title>
    </head>
    <body>
        <h1>Add a Topic</h1>
        <form method="post" action="addArticle.php">
            <p><label for="articleTitle">Title:</label><br>
            <input type="text" id="articleTitle" name="articleTitle" size="40"
            maxlength="150" required="required"></p>
            <p><label for="articleBody">Body:</label><br>
            <textarea id="articleBody" name="articleBody" rows="8"
            cols="40"></textarea>
            <p><label for="articleAuthor">Author:</label><br>
            <input type="text" id="articleAuthor" name="articleAuthor" size="40"
            maxlength="150" required="required"></p>
            <p><label for="articleDate">Date:</label><br>
            <input type="date" id="articleDate" name="articleDate" size="40"
            maxlength="150" required="required"></p>
            <button type="submit" name="submit" value="submit">Add Topic</button>
        </form>
    </body>
</html>