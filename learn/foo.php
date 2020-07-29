<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Sent</title>
</head>
<body>
    <p>
        You sent a form:
    </p>
    <ul>
        <li>Post Name: <?php echo $_POST['name'] ?></li>
        <li>Post Email: <?php echo $_POST['email'] ?></li>
        <li>Request Name: <?php echo $_REQUEST['name'] ?></li>
        <li>Request Email: <?php echo $_REQUEST['email'] ?></li>
    </ul>
</body>
</html>