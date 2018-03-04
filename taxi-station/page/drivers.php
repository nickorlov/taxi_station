<?php include_once '../header.php'; ?>

<div class="col-sm-12 content">
    <p><a class="btn btn-outline-secondary" href="../new/driver.php" role="button">Add new driver</a></p>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Car</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $drivers = $mysqli->query(
            "SELECT drivers.name, drivers.surname, drivers.phone, cars.make, cars.model, cars.numbers FROM drivers 
                LEFT JOIN cars ON cars.id = drivers.car
                ORDER BY drivers.name"
        );
        $count = 0;
        while ( $driver = $drivers->fetch_assoc() ) {
            $count++;
            ?>
            <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $driver['name'].' '.$driver['surname']; ?></td>
                <td><?php echo $driver['phone']; ?></td>
                <td><?php echo $driver['make'].' '.$driver['model'].' ['.$driver['numbers'].']'; ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once '../footer.php'; ?>