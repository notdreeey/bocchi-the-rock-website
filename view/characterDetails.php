<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bocchi the Rock!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

 <section id="char-sc" class="character-section">
    <div class="character-details">
        <h2 ><?php echo htmlspecialchars($character['name']); ?></h2>
        <img src="uploads/<?php echo htmlspecialchars($character['image_path']); ?>" alt="<?php echo htmlspecialchars($character['name']); ?>" >
        <p>Role: <?php echo htmlspecialchars($character['role']); ?></p>
        <p><?php echo htmlspecialchars($character['info']); ?></p>
        <a href="index.php?command=character#character-list">Back to character list</a>
    </div>
</section>

</body>
</html>