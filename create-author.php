<?php
include("db.php");

    if(isset($_POST['submit'])) {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];

        if(empty($first_name) || empty($last_name) || empty($gender)) {
            $err = "*All fields required!";
        } else {
            $sql = "INSERT INTO author (first_name, last_name, gender) VALUES ('$first_name', '$last_name', '$gender')";
            $statement = $connection->prepare($sql);
            $statement->execute();
            // $statement->setFetchMode(PDO::FETCH_ASSOC);
            header('Location: ./posts.php');
        }
    }
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
                    <h1>Create new author</h1>
                </header>
                <form action="create-author.php" method="POST" id="postsForma">

                <div class="va-c-form va-c-new-post">
                    <div class="va-c-form-group">
                        <label for="author" class="va-c-control-label">First name</label>
                        <input type="text" name="first_name" id="first_name" placeholder="Enter Your first name" class="va-c-form-control" required>
                    </div>

                    <div class="va-c-form-group">
                        <label for="title" class="va-c-control-label">Last name</label>
                        <input type="text" name="last_name" id="last_name" placeholder="Enter Your last name" class="va-c-form-control" required>
                    </div>

                        <label for="content" class="va-c-control-label">Your gender:</label><br>
                        <input type="radio" name="gender" id="M" value="M"></input>
                        <label for="male">Male</label><br>
                        <input type="radio" name="gender" id="Z" value="Z"></input>
                        <label for="female">Female</label><br>

                    <div class="va-c-form-group">
                        <button class="va-c-btn va-c-btn--primary" type="submit" name="submit">Submit</button>
                        
                    </div>
                    <?php include('sidebar.php');?>
                </div>
            </div>
        </main>
    </div>

</body>
</html>
<?php include('footer.php');?>