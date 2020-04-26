<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <title>Салон красоты</title>
    <style>
        html {
            background-color: aliceblue;
        }
        body {
            font-family: Ubuntu, sans-serif;
            font-weight: 300;
        }
        main {
            background-color: white;
            border-radius: 10px;
            border: 1px solid lightblue;
            padding: 2% 4%;
            margin: 0 auto;
            width: 70%;
            box-shadow: 5px 5px 5px -5px lightblue;
        }
        h1, th {
            color: mediumvioletred;
        }
        table {
            border-collapse: collapse;
            border: 2px double white;
            color: darkslategray;
            margin: 0 auto;
        }
        td, th {
            border: 1px dashed lightslategray;
            padding: 5px 10px;
            margin: 0;
        }
    </style>
</head>
<body>
<main>
    <h1>Салон красоты</h1>
    <?php
    // Соединение с базой данных
    $link = mysqli_connect('localhost','brier','sunnyday','beauty');
    //Проверка соединения
    if(mysqli_connect_errno()) die('<p>Ошибка соединения:'.mysqli_connect_error().'</p>');
    else {
        print ('<p>Соединение успешно установлено!</p>');
        echo '<table border="1">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>#</th>';
        echo '<th>Дата</th>';
        echo '<th>Время</th>';
        echo '<th>Клиент</th>';
        echo '<th>Контактный номер</th>';
        echo '<th>Услуга</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $res = mysqli_query($link,
            "SELECT DAY(`date`), MONTHNAME(`date`), YEAR(`date`), HOUR(`time`), MINUTE(`time`), `name`, `telephone`, `service` FROM visit INNER JOIN clients ON client = clients.id ORDER BY `date`, `time`");
        if($res) {
            $counter = 1;
            while($row = mysqli_fetch_assoc($res)) {
                echo '<tr>';
                echo '<td>' . $counter++ . '</td>';
                echo '<td>' . $row['DAY(`date`)'] . ' ' . $row['MONTHNAME(`date`)'] . ' ' . $row['YEAR(`date`)'] . '</td>';
                echo '<td>' . $row['HOUR(`time`)'] . ':' . $row['MINUTE(`time`)'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['telephone'] . '</td>';
                echo '<td>' . $row['service'] . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            mysqli_free_result($res);
        }
        mysqli_close($link);
    }
    ?>
</main>
</body>
</html>