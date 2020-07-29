<?php
    try {
        require "../config.php";
        require "../commons.php";
        $conn = new PDO($dsn, $username, $password, $options);

        if (isset($_GET['update'])) {
            $contact = [
                "id" => $_GET['update'],
                "firstname" => $_POST['firstname'],
                "lastname" => $_POST['lastname'],
                "phone" => $_POST['phone'],
                "email" => $_POST['email'],
                "birth" => $_POST['birth']
            ];
            $sql = "UPDATE contacts
                SET firstname = :firstname,
                    lastname = :lastname,
                    phone = :phone,
                    email = :email,
                    birth = :birth
                WHERE id = :id";
            $stat = $conn->prepare($sql);
            $stat->execute($contact);
        } else if (isset($_GET['create'])) {
            // Adds a new contact in table
            $contact = [
                "firstname" => strtoupper($_POST['firstname']),
                "lastname" => $_POST['lastname'],
                "phone" => $_POST['phone'],
                "email" => $_POST['email'],
                "birth" => $_POST['birth'],
                "active" => 1
            ];
            $sql = sprintf("INSERT INTO contacts (%s) VALUES (%s)",
                implode(",", array_keys($contact)),
                ":" . implode(", :", array_keys($contact))
            );
            $stat = $conn->prepare($sql);
            $stat->execute($contact);
        } else if (isset($_GET['delete'])) {
            // Soft deletes a contact from table
            $id = $_GET['delete'];
            $contact = [ "id" => $id ];
            $sql = "UPDATE contacts SET active = 0 WHERE id = :id";
            $stat = $conn->prepare($sql);
            $stat->execute($contact);
        }
        // Read / Searching operations
        $sql = "SELECT * FROM contacts WHERE active = 1";
        $ins = 0;
        if (isset($_POST['submit'])) {
            $query = explode(" ", 
                trim(
                    strtoupper($_POST['search'])
                )
            );
            array_walk($query, 'pad_percent');
            if (count($query) > 0) {
                $ins = 1;
                $sql = $sql . 
                    " AND (firstname LIKE " . 
                    implode(" OR firstname LIKE ", $query ) .
                    " OR lastname LIKE " .
                    implode(" OR lastname LIKE ", $query) . ")";
            }
        }
        
        $stat = $conn->prepare($sql);
        $stat->execute();
        $result = $stat->fetchAll();
    } catch (PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
        echo $contact;
    }
?>

<?php include "templates/header.php" ?>

<main class="mx-4 my-2">
    <h1>Contacts</h1>
    <div id="search-div">
        <form action="/index.php" method="post" class="mx-3">
            <div class="form-group row">
                <input class="form-control w-75" type="text" id="search" name="search" placeholder="Search">
                <div class="w-25">
                    <input class="btn btn-primary <?php if ($ins == 1) { echo "w-50"; } else { echo "w-100"; } ?>" type="submit" value="Search" id="submit" name="submit">
                    <?php if ($ins == 1) { ?>
                    <a href="/index.php"><button class="btn btn-secondary w-50">See All</button></a>
                    <?php } ?>
                </div>
            </div>
        </form>
    </div>
    <div id="contacts-div">
        <?php if ($result && $stat->rowCount() > 0) { ?>
        <?php foreach ($result as $contact) { ?>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title"><?php echo escape(ucwords(strtolower($contact["firstname"] . " " . $contact["lastname"]))); ?></h4>
                    <p class="card-text">
                        <?php if ($contact['phone']) {
                            echo escape($contact['phone']);
                        } else {
                            echo escape($contact['email']);
                        } ?>
                    </p>
                    <div class="options">
                        <a href="edit.php?id=<?php echo escape($contact['id']); ?>" class="edit-contact">Edit</a>
                        <a href="/index.php?delete=<?php echo escape($contact['id']); ?>">Delete</a>
                    </div>
                </div>
                <span class="contact-del"></span>
            </div>
        <?php }?>
        <?php } else { ?>
        <div class="d-flex flex-column align-items-center">
            <img src="assets/lupa.png"  alt="" class="image-fuild" styles="max-width=100px; margin: auto 0;"> <br>
            <p>Nothing found</p>
        </div>
        <?php } ?>
    </div>
    <div class="footer mt-4">
        <a class="w-100" href="add.php"><button class="btn btn-primary w-100">Add Contact</button></a>
    </div>
</main>


<?php include "templates/footer.php" ?>
