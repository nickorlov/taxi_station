<?php include_once '../header.php'; ?>

    <div class="col-sm-12 content">
        <p><a class="btn btn-outline-secondary" href="../new/car.php" role="button">Add new car</a></p>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Make</th>
                <th scope="col">Model</th>
                <th scope="col">Numbers</th>
                <th scope="col">Driver</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $cars = $mysqli->query(
                "SELECT cars.make, cars.model, cars.numbers, 
                GROUP_CONCAT(concat(drivers.name, ' ', drivers.surname) SEPARATOR ', ') AS name FROM cars 
                LEFT JOIN drivers ON cars.id = drivers.car
                GROUP BY cars.id ORDER BY cars.make"
            );
            $count = 0;
            while ( $car = $cars->fetch_assoc() ) {
                $count++;
                ?>
                <tr>
                    <th scope="row"><?php echo $count; ?></th>
                    <td><?php echo $car['make']; ?></td>
                    <td><?php echo $car['model']; ?></td>
                    <td><?php echo $car['numbers']; ?></td>
                    <td><?php echo $car['name']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>

<?php include_once '../footer.php'; ?>