<?php
require_once '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://i.postimg.cc/SKm2g8wP/Screenshot-2024-06-17-120555-modified.png" type="image/x-icon">
    <title>UAS BACKEND</title>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="../output.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#Mytable').DataTable();
        });
    </script>
    <?php session_start() ?>
</head>

<body>
    <?php require_once 'partials/header.php'; ?>
    <main class="mx-auto max-w-7xl py-24 px-6">
        <?php
        if (isset($_SESSION['error'])) {
            include 'components/error.php';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            include 'components/success.php';
            unset($_SESSION['success']);
        }
        $router = require_once '../routes/index.php';
        ?>
    </main>
    <?php require_once 'partials/footer.php'; ?>
    <script src="app.js"></script>
</body>

</html>