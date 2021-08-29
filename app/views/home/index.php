<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
</head>
<body>
<h1><?= $h1 ?></h1>
    <table border="3 solid">
        <?php foreach($data as $d): ?>
        <tr>
            <td><?= $d["id"] ?></td>
            <td><?= $d["name"] ?></td>
            <td><?= $d["email"] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>