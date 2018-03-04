<?php include_once '../header.php'; ?>

<div class="col-sm-12 content">
    <?php
    if ( isset($_GET['id']) ) {
        $id = $_GET['id'];
        $finish = $mysqli->query("UPDATE orders SET finished = 'Yes' WHERE id = '$id'");
        if (!$finish) {
            echo "<div class=\"alert alert-danger\" role=\"alert\">Error!</div>";
        } else {
            echo "<div class=\"alert alert-success\" role=\"alert\">Successfully finished!</div>";
        }
    }
    ?>
    <p><a class="btn btn-outline-secondary" href="../new/order.php" role="button">Create new order</a></p>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Route</th>
                <th scope="col">Driver</th>
                <th scope="col">Car</th>
                <th scope="col">Phone</th>
                <th scope="col">Date</th>
                <th scope="col">Finished</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $orders = $mysqli->query(
            "SELECT orders.id, orders.route, orders.date, orders.phone, orders.finished, drivers.name, 
            drivers.surname, cars.make, cars.model, cars.numbers FROM orders 
                INNER JOIN drivers ON drivers.id = orders.driver 
                INNER JOIN cars ON cars.id = drivers.car 
                ORDER BY orders.id DESC"
            );
            $count = 0;
            while ( $order = $orders->fetch_assoc() ) {
                $count++;
            ?>
            <tr>
                <th scope="row"><?php echo $count; ?></th>
                <td><?php echo $order['route']; ?></td>
                <td><?php echo $order['name'].' '.$order['surname']; ?></td>
                <td><?php echo $order['make'].' '.$order['model'].' ['.$order['numbers'].']'; ?></td>
                <td><?php echo $order['phone']; ?></td>
                <td><?php echo $order['date']; ?></td>
                <td><?php
                    if ($order['finished'] == 'Yes') {
                        echo $order['finished'];
                    } elseif ($order['finished'] == 'No') {
                        echo "<a class=\"btn btn-outline-secondary\" href=\"orders.php?id={$order['id']}\" role=\"button\">Finish</a>";
                    }
                    ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include_once '../footer.php'; ?>