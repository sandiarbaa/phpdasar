<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 2</title>
</head>
<body>
    <table border="1" cellpadding="20" cellspacing="0">
        <?php
            for($r = 1; $r <= 3; $r++) {
                echo "<tr>";
                for($c = 1; $c <= 5; $c++) {
                    echo "<td>$r, $c</td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>