<?php include "templates/header.php"; ?>

<main>
    <form action="/index.php?create" method="post">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="firstname" id="firstname-label">First Name</label>
            <input class="col-sm-10 form-control" type="text" id="firstname" name="firstname" required value=""><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="lastname" id="lastname-label">Last Name</label>
            <input class="col-sm-10 form-control" type="text" id="lastname" name="lastname" value=""><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="phone" id="phone-label">Phone</label>
            <input class="col-sm-10 form-control" type="text" id="phone" name="phone" value=""><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="email" id="email-label">Email</label>
            <input class="col-sm-10 form-control" type="text" id="email" name="email" value=""><br>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="birth" id="birth-label">Birthday</label>
            <input class="col-sm-10 form-control" type="date" name="birth" id="birth" value=""><br>
        </div>
        <div class="form-group row">
            <a href="index.php" class="w-50"><input class="btn btn-secondary w-100" type="button" value="Cancel"></a>
            <input class="btn btn-primary w-50" type="submit" value="OK">
        </div>
    </form>
</main>

<?php include "templates/footer.php"; ?>