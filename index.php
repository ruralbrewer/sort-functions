<?php

namespace SortFunctions;

require './vendor/autoload.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Union Find - Kruskal</title>
    <link rel="stylesheet" type="text/css" href="main.css?v=<?= time() ?>">
    <script type="application/javascript">
        function init() {
            document.getElementById("spinner").style.visibility =  "hidden";
            let runner = document.getElementById("runner");
            runner.addEventListener("click", function() {
                let sorter = document.getElementById("sort-type").value;
                let arraySize = document.getElementById("array-size").value;
                window.location.href = "/index.php?sorter=" + sorter + "&size=" + arraySize;
            });
        }
    </script>
</head>
<body onload="init()">
    <div id="spinner"><img alt="loading..." src="spinner.gif" width="200"></div>
    <h1>Sort Functions</h1>
    <?php
        $size = (isset($_GET['size']) && !empty($_GET['size'])) ? intval($_GET['size']) : 11;
        $sorter = (isset($_GET['sorter'])) ? $_GET['sorter'] : 'quick-sort';

        switch($sorter)
        {
            case "quick-sort":
                $sorter = new QuickSort();
                break;
            case "merge-sort":
                $sorter = new MergeSort();
                break;
            case "insertion-sort":
                $sorter = new InsertionSort();
                break;
            case "selection-sort":
                $sorter = new SelectionSort();
                break;
            case "bogo-sort":
                $sorter = new BogoSort();
                break;
            default:
                die("It takes all sorts ... ");
        }

        $sorerName = preg_replace("/SortFunctions\\\/", '', get_class($sorter));

        $testArray = [];

        for($i = 0; $i < $size; $i++) {
            $testArray[] = rand(1, $size);
        }

        $sortedArray = $sorter->sort($testArray);

        $executionTime = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

    ?>
    <h3>Using <?= $sorerName ?></h3>

    <label for="sort-type">Type of Sort </label>
    <select id="sort-type">
        <option value="merge-sort" <?= ($sorerName == 'MergeSort') ? 'selected' : '' ?>>MergeSort</option>
        <option value="quick-sort" <?= ($sorerName == 'QuickSort') ? 'selected' : '' ?>>QuickSort</option>
        <option value="insertion-sort" <?= ($sorerName == 'InsertionSort') ? 'selected' : '' ?>>InsertionSort</option>
        <option value="selection-sort" <?= ($sorerName == 'SelectionSort') ? 'selected' : '' ?>>SelectionSort</option>
        <option value="bogo-sort" <?= ($sorerName == 'BogoSort') ? 'selected' : '' ?>>Bogo Sort</option>
    </select>
    <br><br>
    <label for="array-size">Size of Array </label>
    <input id="array-size" type="text" value="<?= $size ?>">
    <br><br>
    <button id="runner">Run Sort</button>
    <p><em>This sort took <?= $executionTime ?> seconds</em></p>
    <p><strong>Original Array : </strong></p>
    <p><?= join(', ',$testArray ) ?></p>
    <p><strong>Sorted Array : </strong></p>
    <p><?= join(', ',$sortedArray ) ?></p>
</body>
</html>
