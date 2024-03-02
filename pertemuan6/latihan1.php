<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: #BADA55;
            text-align: center;
            font-size: 25px;
            line-height: 50px;
            margin: 3px;
            display: inline-block;
            transition: .5s;
        }

        .kotak:hover {
            transform: rotate(360deg);
            /* rotate: 360deg; */
            border-radius: 80%;
        }
    </style>
</head>
<body>
    
<?php
    $angka = [
        [1,2,3],
        [4,5,6],
        [7,8,9]
    ]
?>
    <?php foreach($angka as $a) : ?>
        <?php foreach($a as $b) : ?>
        <div class="kotak"><?= $b ?></div>
        <?php endforeach; ?>
        <br>
    <?php endforeach; ?>
</body>
</html>