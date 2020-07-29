<?php 
    require "../config.php";
    require "../commons.php";

    if (isset($_GET['id'])) {
        try {
            $conn = new PDO($dsn, $username, $password, $options);
            $id = $_GET['id'];
            $sql = "SELECT * FROM contacts WHERE id = :id";
            $stat = $conn->prepare($sql);
            $stat->bindValue(':id', $id);
            $stat->execute();
            $contact = $stat->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
    } else {
        echo "Something went wrong";
        exit;
    }
?>

<?php include "templates/header.php"; ?>

<main>
    <form action="/index.php?update=<?php echo escape($id); ?>" method="post">
        <input type="text" name="id" id="id" value="<?php echo escape($id); ?>" style="display: none;">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="firstname" id="firstname-label" required>First Name</label>
            <input class="col-sm-10  form-control" type="text" id="firstname" name="firstname" value="<?php echo escape($contact['firstname']) ?>"><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="lastname" id="lastname-label">Last Name</label>
            <input class="col-sm-10 form-control" type="text" id="lastname" name="lastname" value="<?php echo escape($contact['lastname']) ?>"><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="phone" id="phone-label">Phone</label>
            <input class="col-sm-10 form-control" type="text" id="phone" name="phone" value="<?php echo escape($contact['phone']) ?>"><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="email" id="email-label">Email</label>
            <input class="col-sm-10 form-control" type="text" id="email" name="email" value="<?php echo escape($contact['email']) ?>"><br>
        </div>
        <div class="from-group row">
            <label class="col-sm-2 col-form-label" for="birth" id="birth-label">Birthday</label>
            <input class="col-sm-10 form-control" type="date" name="birth" id="birth" value="<?php echo escape($contact['birth']) ?>"><br>
        </div>
        <div class="row">
            <a class="w-50" href="index.php"><input class="btn btn-secundary w-100" type="button" value="Cancel"></a>
            <input class="btn btn-primary w-50" type="submit" value="OK">
        </div>
    </form>
</main>

<?php include "templates/footer.php"; ?>