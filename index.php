<?php
include __DIR__ . "/partials/header.php";
if (isset($_GET["parking"])) {
    $parking = $_GET["parking"];
    $hotels = array_filter($hotels, fn($hotel) => $parking == 'all' || $hotel['parking'] == $parking);
}
if (isset($_GET["vote"])) {
    intval($vote = $_GET["vote"]);
    $hotels = array_filter($hotels, fn($hotel) => ($vote == '') || $hotel['vote'] >= $vote);
}

?>
<main class="container">
    <!-- Form -->
    <section class="d-flex flex-column align-items-center justify-content-center pb-5">
        <form action="index.php" method="GET">
            <div class="mb-3">
                <label for="parking" class="form-label">
                    Do you need parking?
                </label>
                <select class="form-select" name="parking">
                    <option value="all">All</option>
                    <option value="1">Sì</option>
                    <option value="0">No</option>
                </select>
            </div>
            <div class="mb-3 d-flex flex-column">
                <label for="vote" class="form-label">
                    How many stars?
                </label>
                <input type="number" name="vote" placeholder="1-5" max="5" min="1">
            </div>
            <button class="btn btn-primary" type="submit">
                Filter
            </button>
        </form>
    </section>

    <!-- Table -->
    <?php if (!empty($hotels)) { ?>
        <table class="table table-primary rounded-3">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Parking</th>
                    <th scope="col">Vote</th>
                    <th scope="col">Distance to center</th>
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
                            <?php echo $hotel['distance_to_center'] . ' km' ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else { ?>
        <div class="text-bg-danger p-4 rounded-3">
            <h2>Nessun Risultato!!</h2>
            <ul>
                <li>
                    Controlla i valori inseriti
                </li>
                <li>
                    Non esistono hotel con queste caratteristiche!
                </li>
            </ul>
        </div>
    <?php } ?>
</main>

</body>

</html>