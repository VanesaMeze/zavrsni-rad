<?php
include("db.php");

    if(isset($_POST['submit'])) {
        $title = $_POST['title'];
        $body = $_POST['body'];
        $author = $_POST['author'];

    if(empty($title) || empty($body) || empty($author)) {
        $err = "*All fields required!";
    } else {
        $currentDate = date('Y-m-d h:i');
        $sql = "INSERT INTO posts (title, body, created_at, author_id) 
        VALUES ('$title', '$body', '$currentDate', '$author')";

        $statement = $connection->prepare($sql);
        $statement->execute();
        // $statement->setFetchMode(PDO::FETCH_ASSOC);
        header('Location: ./posts.php');
        }
    }

        $sql = "SELECT id, first_name, last_name, gender FROM author";
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $authors = $statement->fetchAll();

?>

<!DOCTYPE html>
<html>
<?php include("header.php"); ?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Vivify Blog</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" 
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" 
    integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="styles/blog.css">
    <link rel="stylesheet" href="styles/styles.css">
</head>

<body class="va-l-page va-l-page--homepage">

<div class="va-l-container">
        <main class="va-l-page-content">
            <div class="blog-post">
                <header class="va-l-page-header">
                    <h1>Create new post</h1>
                </header>
                <form action="create-post.php" method="POST" id="postsForma">
                <div class="va-c-form va-c-new-post">

                        <li><label for="author">Select post author:</label></li>
                    <li>
                        <select class="<?php echo $author['gender'] ?>" name="author" placeholder="Select Author" >
                            <?php foreach($authors as $author) { ?> 
                                <option class="<?php echo $author['gender'] ?>" value="<?php echo $author['id'] ?>" style="color: <?php if($author["gender"] =="Z"){echo "Salmon";} else if($author["gender"] =="M"){echo "CornflowerBlue";}?>;" href="#">
                                    <?php echo ($author['first_name']) . ' ' . ($author['last_name'])?>
                                </option>
                            <?php } ?>
                        </select>
                    </li>
                            </br>

                    <div class="va-c-form-group">
                        <label for="title" class="va-c-control-label">Title</label>
                        <input type="text" name="title" id="title" placeholder="Enter title" class="va-c-form-control" required>
                    </div>

                    <div class="va-c-form-group">
                        <label for="content" class="va-c-control-label">Content</label>
                        <textarea type="body" name="body" id="body" placeholder="Enter content" rows="10" id="bodyPosts" class="va-c-form-control" required></textarea><br>
                    </div>

                    <div class="va-c-form-group">
                        <button class="va-c-btn va-c-btn--primary" type="submit" name="submit">Create</button>
                        
                    </div>
                </div>
                <?php include('sidebar.php');?>
            </div>
        </main>
    </div>
</body>
</html>
<?php include('footer.php')?>