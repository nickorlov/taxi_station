<?php include_once '../header.php'; ?>

    <div class="col-sm-12 content">
        <h3 class="text-center">New driver</h3>
        <?php
        if ( isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['car']) ) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $phone = $_POST['phone'];
            $pCar = $_POST['car'];
            if ($name != '' && $surname != '' && $phone != '' && $pCar != '') {
                $newDriver = $mysqli->query(
                    "INSERT INTO drivers (name, surname, car, phone)
                VALUES ('$name', '$surname', '$pCar', '$phone')");
                if (!$newDriver) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Error!</div>";
                } else {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Successfully added!</div>";
                }
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please fill empty rows!</div>";
            }
        }
        ?>
        <form action="driver.php" method="POST">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" type="text" placeholder="Name">
            </div>
            <div class="form-group">
                <label for="surname">Surname</label>
                <input name="surname" id="surname" class="form-control" type="text" placeholder="Surname">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="car">Car</label>
                <select name="car" class="form-control" id="car">
                    <?php
                    $cars = $mysqli->query("SELECT id, make, model, numbers FROM cars ORDER BY make");
                    while ( $car = $cars->fetch_assoc() ) {
                        echo "<option value='".$car['id']."'>".$car['make'].' '.$car['model'].' ['.$car['numbers'].']'."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Create driver</button>
        </form>
    </div>

<?php include_once '../footer.php'; ?>