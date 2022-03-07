<?php
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
$city = $_SESSION['city'];
$userID = $_SESSION['user_id']; //this value is obtained from the login page when the user is verified
checkSession($path); //calling the function from session.php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styles/mobile.css">
    <link rel="stylesheet" media="only screen and (min-width:720px)" href="styles/desktop.css">
    <title><?php echo ucfirst($userFN) . "'s Profile" ?></title>
</head>

<body>
    <header>
        <div id="logo">
            <!-- logo -->
        </div>
        <nav>
            <ul>
                <li><a href="userProfile.php"></a><?php echo ucfirst($userFN); ?></li>
                <li><a href="logout.php"></a>Log out</li>
            </ul>
        </nav>
    </header>


    <!-- <a href="logout.php">Logout</a> -->

    <div class="profile">
        <h1>Welcome <?php echo ucfirst($userFN); ?></h1>

        <div>
            <a href="createArticle.php"> > Write a New Article Here < | </a>
            <a href="editArticle.php"> | > Edit your article Here < | </a>
            <a href="editProfile.php"> | > Edit your profile Here < </a>
        </div>

        <div class="contentSmall">
            <div class="subscriptions">
                <h2 class="ptitle">Subscriptions</h2>
                <p>You have no subscriptions yet</p>
            </div>
            <div class="card">
                <h2 class="ptitle">Trending</h2>

                <div class="content">
                    <section class="imgContents">
                        <div>
                            <a href="article.php">
                                <div class="articleDetailsSmall">
                                    <img src="images/Bus.png" alt="#">
                                    <div class="contentsSmall">
                                        <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                        <div class="postSmall">
                                            <h5 class="authorSmall">User's Name</h5>
                                            <h5 class="timePostedSmall">59 minutes ago</h5>
                                            <h5 class="citySmall">Birmingham</h5>
                                        </div>
                                        <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet.</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="article.php">
                                <div class="articleDetailsSmall">
                                    <img src="images/Bus.png" alt="#">
                                    <div class="contentsSmall">
                                        <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                        <div class="postSmall">
                                            <h5 class="authorSmall">User's Name</h5>
                                            <h5 class="timePostedSmall">59 minutes ago</h5>
                                            <h5 class="citySmall">Birmingham</h5>
                                        </div>
                                        <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div>
                            <a href="article.php">
                                <div class="articleDetailsSmall">
                                    <img src="images/Bus.png" alt="#">
                                    <div class="contentsSmall">
                                        <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                        <div class="postSmall">
                                            <h5 class="authorSmall">User's Name</h5>
                                            <h5 class="timePostedSmall">59 minutes ago</h5>
                                            <h5 class="citySmall">Birmingham</h5>
                                        </div>
                                        <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </section>
                </div>

                <div class="showMore">
                    <a href="#">Show More</a>
                </div>
            </div>
            <div class="locationSpecific">
                <div class="card">
                    <h2 class="ptitle"><?php echo ucfirst($city); ?> Articles</h2>

                    <div class="content">
                        <section class="imgContents">
                            <div>
                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet.</h5>
                                        </div>
                                    </div>
                                </a>

                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet.</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet</h5>
                                        </div>
                                    </div>
                                </a>

                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet.</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div>
                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet</h5>
                                        </div>
                                    </div>
                                </a>

                                <a href="article.php">
                                    <div class="articleDetailsSmall">
                                        <img src="images/Bus.png" alt="#">
                                        <div class="contentsSmall">
                                            <h3 class="articleTitleSmall">House inflation prices revealed</h3>
                                            <div class="postSmall">
                                                <h5 class="authorSmall">User's Name</h5>
                                                <h5 class="timePostedSmall">59 minutes ago</h5>
                                                <h5 class="citySmall">Birmingham</h5>
                                            </div>
                                            <h5 class="descriptionSmall">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas euismod pharetra nisi, et convallis massa ultrices nec. Maecenas justo massa, cursus non fermentum sed, mollis id est. Vestibulum id ultricies est, non lacinia metus. Nunc id molestie nisi. Sed tincidunt fringilla lacus, et hendrerit dolor aliquam sit amet.</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </section>
                    </div>

                    <div class="showMore">
                        <a href="#">Show More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>