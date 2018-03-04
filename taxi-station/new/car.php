<?php include_once '../header.php'; ?>

    <div class="col-sm-12 content">
        <h3 class="text-center">New car</h3>
        <?php
        if ( isset($_POST['make']) && isset($_POST['model']) && isset($_POST['numbers']) ) {
            $make = $_POST['make'];
            $model = $_POST['model'];
            $numbers = $_POST['numbers'];
            if ($make != '' && $model != '' && $numbers != '') {
                $newCar = $mysqli->query(
                    "INSERT INTO cars (make, model, numbers)
                VALUES ('$make', '$model', '$numbers')");
                if (!$newCar) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Error!</div>";
                } else {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Successfully added!</div>";
                }
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please fill empty rows!</div>";
            }
        }
        ?>
        <form action="car.php" method="POST">
            <div class="form-group">
                <label for="make">Make</label>
                <input name="make" id="make" class="form-control" type="text" placeholder="Make">
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input name="model" id="model" class="form-control" type="text" placeholder="Model">
            </div>
            <div class="form-group">
                <label for="numbers">Numbers</label>
                <input name="numbers" id="numbers" class="form-control" type="text" placeholder="Numbers">
            </div>
            <button type="submit" class="btn btn-secondary">Create a car</button>
        </form>
    </div>

<?php include_once '../footer.php'; ?>