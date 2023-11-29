<?php
include __DIR__ . "/partials/header.php";
?>
<main>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">name</th>
                <th scope="col">description</th>
                <th scope="col">parking</th>
                <th scope="col">vote</th>
                <th scope="col">distance to center</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hotels as $hotel) { ?>
                <tr>
                    <th scope="row">
                        <?php echo $hotel['name'] ?>
                    </th>
                    <td>
                        <?php echo $hotel['description'] ?>
                    </td>
                    <td>
                        <?php echo ($hotel['parking']) ? "Sì" : "No" ?>
                    </td>
                    <td>
                        <?php echo $hotel['vote'] ?>
                    </td>
                    <td>
                        <?php echo $hotel['distance_to_center'] . 'km' ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>

</body>

</html>