<?php
    $angka = [1,5,33,23,68,-15,20,54,-76,90];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array PHP</title>
    <style>
        .kotak {
            width: 80px;
            height: 80px;
            background-color: salmon;
            text-align: center;
            line-height: 80px;
            font-size: 30px;
            margin: 5px;
            /* float: left; */
            display: inline-block;
        }
    </style>
</head>
<body>

    <?php for($i = 0; $i < count($angka); $i++) : ?>
        <div class="kotak"><?= $angka[$i]; ?></div>
    <?php endfor; ?>

    <br>

    <?php foreach ($angka as $a) { ?>
        <div class="kotak"><?php echo $a; ?></div>
    <?php } ?>

    <br>
    
    <?php foreach ($angka as $a) : ?>
        <div class="kotak"><?= $a; ?></div>
    <?php endforeach; ?>

</body>
</html>