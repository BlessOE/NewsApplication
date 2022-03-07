<?php include_once('header.php') ?>
<!-- </?php include("config.php") ?> -->

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

<head>
    <title>News | Edit Article</title>
</head>

<body>
    <h1>Edit Article</h1>

    <div class="articleForm">
        <?php foreach ($query as $q) { ?>
            <form action="upload.php" method="GET" enctype="multipart/form-data">
                <input type="text" hidden name="articleId" value="<?php echo $q['articleId']; ?>">
                <div class="articleTitle">
                    <label>Article Title</label>
                    <input type="text" name="articleTitle" value="<?php echo $q['articleTitle']; ?>" required>
                </div>
                <div class="articleContent">
                    <label>Article Content</label>
                    <textarea name="articleContext" id="content" maxlength="3000" value="<?php echo $q['articleContent']; ?>"></textarea>
                </div>
                <div class="articleCity">
                    <label>City Article is Written About</label>
                    <input type="text" name="articleCity" value="<?php echo $q['locatedCity']; ?>" required>
                </div>
                <div class="upload">
                    <input type="file" name="file"> <!-- can upload any file -->
                    <button type="submit" name="submit">Upload</button>
                </div>
            </form>
        <?php } ?>
    </div>
    <div>
        <a class="button" href="article.php">Update Article</a>
    </div>



</body>

</html>