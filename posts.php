<?php 
    include('db.php');
?>

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
    $sql = "SELECT * FROM posts ORDER BY created_at DESC";
    $statement = $connection->prepare($sql);
    $statement->execute();
    $statement->setFetchMode(PDO::FETCH_ASSOC);
    $posts = $statement->fetchAll();
?>

<main role="main" class="container">
    <div class="row">
        <div class="col-sm-8 blog-main">
            <div class="blog-post">

                <?php foreach($posts as $post) { ?>
                    <?php 
                        
                    ?>
                        <h2 class="blog-post-title"><a href="single-post.php?post_id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></h2>
                        <p class="blog-post-meta"><?php echo $post['created_at'];?>
                        <p><?php echo $post['body'];?></p>
                <?php } ?>

                <hr>

            </div><!-- /.blog-post -->
                <nav class="blog-pagination">
                    <a class="btn btn-outline-primary" href="#">Older</a>
                    <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
                </nav>
        </div><!-- /.blog-main -->
            <?php include('sidebar.php'); ?>
    </div><!-- /.row -->

</main><!-- /.container -->
<?php include('footer.php');?>
