<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/blog.css" rel="stylesheet">
    <link href="styles/styles.css" rel="stylesheet">
</head>

<?php include('header.php');
    if (isset($_GET['post_id'])) {
        $sql = "SELECT author.*, posts.* 
        FROM posts INNER JOIN author ON author.id = posts.author_id 
        WHERE posts.id = {$_GET['post_id']}";

        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $singlePost = $statement->fetch();

        $sql2 = "SELECT * FROM comments WHERE post_id = {$_GET['post_id']}";
        $statement = $connection->prepare($sql2);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $comments = $statement->fetchAll();

    }
?>


<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">
                    <article class="va-c-article">
                        <form action="single_post.php" method="post">
                            <input hidden type="text" name="post_id" value="<?php echo($singlePost['id']) ?>">
                            <br><br>
                        </form> 
                        <header>
                            <h1><?php echo $singlePost['title'] ?></h1>
                            <div class="va-c-article__meta"><?php echo $singlePost['created_at']?> by <?php echo $singlePost['first_name'] . " " . $singlePost['last_name']?></div>
                        </header>

                        <div>
                            <p><?php echo $singlePost['body']?></p>
                        </div>
                        <?php include('comments.php'); ?>
                        </div>
                    </article>
            </div>
        </div>
        <?php include "sidebar.php"; ?>
    </div>
</main>
<?php include "footer.php"?>
</html>

