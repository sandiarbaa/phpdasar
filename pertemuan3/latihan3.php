<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
    <style>
        .warna-baris-ganjil {
            background-color: grey;
        }
        .warna-baris-genap {
            background-color: silver;
        }
    </style>
</head>
<body>
    
    <table border="1" cellpadding="20" cellspacing="0">
        <?php for($r = 1; $r <= 5; $r++) : ?>
            <?php if($r % 2 == 1) : ?>
                <tr class="warna-baris-ganjil">
            <?php elseif ($r % 2 == 0) : ?>
                <tr class="warna-baris-genap">
            <?php else : ?>
                <tr>
            <?php endif; ?>
                <?php for($c = 1; $c <= 5; $c++) : ?>
                    <td><?= "$r, $c"; ?></td>
                <?php endfor; ?>
            </tr>
        <?php endfor; ?>
    </table>

</body>
</html>