<?php include_once $_SERVER["DOCUMENT_ROOT"] . "/utils/sorting.php" ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sorter</title>
</head>


<body>

<div>
    <h2>Сортировка слиянием</h2>
    <div>Отсортированный массив: <?= sorting($_REQUEST["array"]) ?></div>
</div>

</body>

</html>
