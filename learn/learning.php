<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>
<body>
    <p>Click to see <a href="info.php">info about PHP</a></p>
    <p>
    <?php print "Hello World" ?>
    <br>
    <?php if (1): ?>
        Verdadeiro
    <?php else: ?>
        Falso
    <?php endif; ?>
    <?php
        $indicesServer = array('PHP_SELF',
        'argv',
        'argc',
        'GATEWAY_INTERFACE',
        'SERVER_ADDR',
        'SERVER_NAME',
        'SERVER_SOFTWARE',
        'SERVER_PROTOCOL',
        'REQUEST_METHOD',
        'REQUEST_TIME',
        'REQUEST_TIME_FLOAT',
        'QUERY_STRING',
        'DOCUMENT_ROOT',
        'HTTP_ACCEPT',
        'HTTP_ACCEPT_CHARSET',
        'HTTP_ACCEPT_ENCODING',
        'HTTP_ACCEPT_LANGUAGE',
        'HTTP_CONNECTION',
        'HTTP_HOST',
        'HTTP_REFERER',
        'HTTP_USER_AGENT',
        'HTTPS',
        'REMOTE_ADDR',
        'REMOTE_HOST',
        'REMOTE_PORT',
        'REMOTE_USER',
        'REDIRECT_REMOTE_USER',
        'SCRIPT_FILENAME',
        'SERVER_ADMIN',
        'SERVER_PORT',
        'SERVER_SIGNATURE',
        'PATH_TRANSLATED',
        'SCRIPT_NAME',
        'REQUEST_URI',
        'PHP_AUTH_DIGEST',
        'PHP_AUTH_USER',
        'PHP_AUTH_PW',
        'AUTH_TYPE',
        'PATH_INFO',
        'ORIG_PATH_INFO') ;

        echo '<table cellpadding="10">' ;
        foreach ($indicesServer as $arg) {
            if (isset($_SERVER[$arg])) {
                echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ;
            }
            else {
                echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ;
            }
        }
        echo '</table>' ;
    ?>
    <form action="foo.php" method="post" id="my-form">
        <label for="name">
            Name:
            <input type="text" name="name" id="name">
        </label> <br>
        <label for="email">
            Email: 
            <input type="email" name="email" id="email">
        </label> <br>
        <input type="submit" value="Submit" name="submit">
    </form>
    <ul>
        <li>Name: <?php echo $_POST['name'] ?></li>
        <li>Email: <?php echo $_POST['email'] ?></li>
    </ul>
</body>
</html>
