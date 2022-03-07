<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="styles/desktop.css">

    <title>News | New Article</title>
</head>

<body>
    <header>
        <div id="logo">
            <!-- logo -->
        </div>
        <nav>
            <ul>
                <li><a href="login.php"></a>Login</li>
                <li><a href="createAccount.php"></a>Sign-up</li>
            </ul>
        </nav>
    </header>

    <?php
    include_once("createArticleSQL.php");
    include("session.php");

    $path = "login.php"; //this path is to pass to checkSession function from session.php 

    session_start(); //must start a session in order to use session in this page.
    if (!isset($_SESSION['email'])) {
        session_unset();
        session_destroy();
        header("Location:" . $path); //return to the login page
    }
    $userFN = $_SESSION['first_name']; //this value is obtained from the login page when the user is verified
    $userLN = $_SESSION['last_name'];
    $userID = $_SESSION['user_id']; //this value is obtained from the login page when the user is verified
    checkSession($path); //calling the function from session.php

    ?>

    <?php
    $errortitle = $errorcontent = $errorlocatedCity = "";
    $allFields = "yes";

    /* 
    
        - article_id
        - time_posted
        - date_posted
        - author_first_name
        - author_last_name
        - title *
        - content *
        - located_city *

    */

    if (isset($_POST['submit'])) {

        if ($_POST['title'] == "") {
            $errortitle = "Please provide a title";
            $allFields = "no";
        }
        if ($_POST['content'] == null) {
            $errorcontent = "Please provide content for this article";
            $allFields = "no";
        }
        if ($_POST['locatedCity'] == "") {
            $errorlocatedCity = "Please enter the city this article is based on";
            $allFields = "no";
        }
        if ($allFields == "yes") {
            $createArticle = createArticle();
            header('Location: article.php?createArticle=' . $createArticle);
        }
    }
    ?>

    <h1>New Article</h1>

    <div class="articleForm">
        <form method="POST" action="">
            <div>
                <input type="hidden" name="timePosted" value="<?php echo date("h:i:s A"); ?>" />
                <input type="hidden" name="datePosted" value="<?php echo date("D d M Y"); ?>" />
                <input type="hidden" name="authorFirstName" value="<?php echo ucfirst($userFN); ?>" />
                <input type="hidden" name="authorLastName" value="<?php echo ucfirst($userLN); ?>" />
                <div class="articleTitle">
                    <label>Article Title</label>
                    <input type="text" name="title" required>
                    <span><?php echo $errortitle; ?></span>
                </div>
                <div>
                    <label>Article Content</label>
                    <!-- <input type="text" name="articleContext" required> -->
                    <textarea name="content" id="content" maxlength="3000"></textarea>
                    <span><?php echo $errorcontent; ?></span>
                </div>
                <div class="articleCity">
                    <label>City Article is Written About</label>
                    <input type="text" name="locatedCity" required>
                    <span><?php echo $errorlocatedCity; ?></span>
                </div>
                <!-- <div class="upload">
                    </!-- action="upload.php" method="GET" enctype="multipart/form-data" --/>
                    <input type="file" name="file"> </!-- can upload any file --/>
                    <button type="submit" name="submit">Upload</button>
                    </!-- <span></?php echo $errorimg; ?></span> --/>
                </div> -->
                <!-- <input type="hidden" name="userId" value="</?php echo $userID; ?>" /> -->
            </div>
            <div>
                <input class="button" type="submit" value="Post" name="submit">
            </div>
        </form>
    </div>



</body>

</html>