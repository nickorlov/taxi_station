<?php include_once 'header.php'; ?>

<div class="col-sm-12 content">
    <h3 class="text-center">Statistics</h3>
    <table class="table mt-4">
        <thead class="thead-light">
        <tr>
            <th scope="col">Total orders</th>
            <th scope="col">Total drivers</th>
            <th scope="col">Total cars</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <?php
                $orders = $mysqli->query("SELECT COUNT(id) AS count from orders");
                $ordersRow = $orders->fetch_assoc();

                $drivers = $mysqli->query("SELECT COUNT(id) AS count FROM drivers");
                $driversRow = $drivers->fetch_assoc();

                $cars = $mysqli->query("SELECT COUNT(id) AS count FROM cars");
                $carsRow = $cars->fetch_assoc();
                ?>
                <td scope="row"><?php echo $ordersRow['count']; ?></td>
                <td><?php echo $driversRow['count']; ?></td>
                <td><?php echo $carsRow['count']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include_once 'footer.php'; ?>