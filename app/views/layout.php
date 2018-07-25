<!DOCTYPE html>
<html lang="en">
    <head>
        <title>News list</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <ul class="nav navbar-nav">
                        <li><a class="navbar-brand" href="/">Home</a></li>
                    </ul>
                    <ul class="nav navbar-nav pull-right">
                        <?php if(!empty($_SESSION['logged_in'])): ?>
                            <li><a class="navbar-brand" href="/auth/logout">logout</a></li>
                            <li><a class="navbar-brand" href="/gallery">Gallery</a></li>
                        <?php else: ?>
                            <li><a class="navbar-brand" href="/auth/login">login</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </nav>
            <?php include $_content; ?>
        </div>
    </body>
</html>
