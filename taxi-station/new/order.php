<?php include_once '../header.php'; ?>

    <div class="col-sm-12 content">
        <h3 class="text-center">New order</h3>
        <?php
        if ( isset($_POST['route']) && isset($_POST['driver']) && isset($_POST['phone']) ) {
            $route = $_POST['route'];
            $driverID = $_POST['driver'];
            $phone = $_POST['phone'];
            if ($route != '' && $driverID != '' && $phone != '') {
                $newOrder = $mysqli->query(
                "INSERT INTO orders (driver, route, phone, date, finished)
                VALUES ('$driverID', '$route', '$phone', NOW(), 'No')");
                if (!$newOrder) {
                    echo "<div class=\"alert alert-danger\" role=\"alert\">Error!</div>";
                } else {
                    echo "<div class=\"alert alert-success\" role=\"alert\">Successfully added!</div>";
                }
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">Please fill empty rows!</div>";
            }
        }
        ?>
        <form action="order.php" method="POST">
            <div class="form-group">
                <label for="route">Route</label>
                <input name="route" id="route" class="form-control" type="text" placeholder="Route">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input name="phone" id="phone" class="form-control" type="text" placeholder="Phone">
            </div>
            <div class="form-group">
                <label for="driver">Driver</label>
                <select name="driver" class="form-control" id="driver">
                    <?php
                    $drivers = $mysqli->query("SELECT id, name, surname FROM drivers ORDER BY name");
                    while ( $driver = $drivers->fetch_assoc() ) {
                        echo "<option value='".$driver['id']."'>".$driver['name'].' '.$driver['surname']."</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-secondary">Create order</button>
        </form>
    </div>

<?php include_once '../footer.php'; ?>