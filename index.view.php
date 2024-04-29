<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo</title>
</head>

<body>
<h1>Recommended Books</h1>
<ul>
    <?php foreach ($filteredItems
    as $item): ?>
    <li>
        <?= $item['name'] ?> --- (<?= $item['author'] ?>) --- (<?= $item['releaseDate'] ?>)
        <?php endforeach; ?>
    </li>
</ul>
</body>
</html>
