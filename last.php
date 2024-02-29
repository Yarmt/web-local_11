<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
    <style>
        .table {
            border-collapse: collapse;
        }

        .table td, .table th {
            border: 1px solid black;
            padding: 5px;
        }

        .tableDiv {
            border: 1px solid black;
            padding: 5px;
            margin: 5px;
            display: inline-block;
        }

        .selected {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <a href="?html_type=table" class="<?= isset($_GET['html_type']) && $_GET['html_type'] === 'table' ? 'selected' : ''; ?>">Табличная верстка</a>
    <a href="?html_type=div" class="<?= isset($_GET['html_type']) && $_GET['html_type'] === 'div' ? 'selected' : ''; ?>">Блочная верстка</a>
    
    <div>
        <?php //вывод умножения
        if (isset($_GET['html_type'])) {
            if ($_GET['html_type'] === 'table' || $_GET['html_type'] === 'div') {
                for ($i = 2; $i <= 9; $i++) {
                    echo '<a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . 'Таблица умножения на ' . $i . '</a><br>'; //
                }
                if (isset($_GET['content'])) {
                    outRow($_GET['content']);
                } else {
                    outTable();
                }
            }
        }
        ?>
    </div>

    <?php
    function outRow($n) { //нужный вывод
        if ($_GET['html_type'] === 'table') {
            echo '<table class="table">';
            for ($i = 2; $i <= 9; $i++) {
                echo '<tr><td>' . $i . ' × ' . $n . ' = ' . ($i * $n) . '</td></tr>';
            }
            echo '</table>';
        }
        elseif ($_GET['html_type'] === 'div') {
            echo '<div class="tableDiv">';
            for ($i = 2; $i <= 9; $i++) {
                echo $i . ' × ' . $n . ' = ' . ($i * $n) . '<br>';
            }
            echo '</div>';
        }
    }

    function outTable() {
        if ($_GET['html_type'] === 'table') {
            echo '<table class="table">';
            for ($i = 2; $i <= 9; $i++) {
                echo '<tr>';
                for ($j = 2; $j <= 9; $j++) {
                    echo '<td>' . $i . ' × ' . $j . ' = ' . ($i * $j) . '</td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        elseif ($_GET['html_type'] === 'div') {
            for ($i = 2; $i <= 9; $i++) {
                echo '<div class="tableDiv">';
                for ($j = 2; $j <= 9; $j++) {
                    echo $i . ' × ' . $j . ' = ' . ($i * $j) . '<br>';
                }
                echo '</div>';
            }
        }
    }

    ?>
</body>
</html>