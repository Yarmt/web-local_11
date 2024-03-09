<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="main.css">
    <title>Таблица умножения</title>
</head>
<body>
    <header class="header">
        <div>
            <h1>Работа 11</h1>
        </div>
    </header>
    <a href="?html_type=table" class="<?= isset($_GET['html_type']) && $_GET['html_type'] === 'table' ? 'selected' : ''; ?>">Табличная верстка</a>
    <a href="?html_type=div" class="<?= isset($_GET['html_type']) && $_GET['html_type'] === 'div' ? 'selected' : ''; ?>">Блочная верстка</a>
    
    <div>
        <?php //вывод умножения
        if (isset($_GET['html_type'])) {
            if ($_GET['html_type'] === 'table' || $_GET['html_type'] === 'div') {
                for ($i = 2; $i <= 9; $i++) {
                    echo '<a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . 'Таблица умножения на ' . $i . '</a><br>';
                }
                if (isset($_GET['content']) && $_GET['content'] >= 2 && $_GET['content'] <= 9) {
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
                echo '<tr><td><a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . $i . '</a> × <a href="?html_type=' . $_GET['html_type'] . '&content=' . $n . '">' . $n . '</a> = <a href="?html_type=' . $_GET['html_type'] . '&content=' . ($i * $n) . '">' . ($i * $n) . '</a></td></tr>';
            }
            echo '</table>';
        }
        elseif ($_GET['html_type'] === 'div') {
            echo '<div class="tableDiv">';
            for ($i = 2; $i <= 9; $i++) {
                echo '<a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . $i . '</a> × <a href="?html_type=' . $_GET['html_type'] . '&content=' . $n . '">' . $n . '</a> = <a href="?html_type=' . $_GET['html_type'] . '&content=' . ($i * $n) . '">' . ($i * $n) . '</a><br>';
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
                    echo '<td><a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . $i . '</a> × <a href="?html_type=' . $_GET['html_type'] . '&content=' . $j . '">' . $j . '</a> = <a href="?html_type=' . $_GET['html_type'] . '&content=' . ($i * $j) . '">' . ($i * $j) . '</a></td>';
                }
                echo '</tr>';
            }
            echo '</table>';
        }
        elseif ($_GET['html_type'] === 'div') {
            for ($i = 2; $i <= 9; $i++) {
                echo '<div class="tableDiv">';
                for ($j = 2; $j <= 9; $j++) {
                    echo '<a href="?html_type=' . $_GET['html_type'] . '&content=' . $i . '">' . $i . '</a> × <a href="?html_type=' . $_GET['html_type'] . '&content=' . $j . '">' . $j . '</a> = <a href="?html_type=' . $_GET['html_type'] . '&content=' . ($i * $j) . '">' . ($i * $j) . '</a><br>';
                }
                echo '</div>';
            }
        }
    }
    ?>
        <footer class="footer <?= isset($_GET['html_type']) ? ($_GET['html_type'] === 'table' ? 'footerTable' : 'footerDiv') : ''; ?>">
        <?php
            if(isset($_GET['html_type'])) {
                if(strtoupper($_GET['html_type']) === 'TABLE') {
                    $s = 'Табличная верстка. ';
                } else {
                    $s = 'Блочная верстка. ';
                }
            } else {
                $s = 'Верстка не выбрана. ';
            }
                
            echo '<br>'.$s.'<br>';

            if( !isset($_GET['content']) ) 
                $s='Таблица умножения полностью. '; 
            else 
                $s='Столбец таблицы умножения на '.$_GET['content']. '. '; 
            echo $s.'<br>';

            echo date("d.m.Y"), ' ', date("H:i:s"); 
        ?>
    </footer>

</body>
</html>