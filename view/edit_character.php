<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Edit Character</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<section id="add_form" class="edit">
<div class="edit_char">
<form action="index.php?command=saveCharacter&id=<?php echo htmlspecialchars($character['id']); ?>" method="POST" enctype="multipart/form-data">
    <h1>Edit Character</h1>    
    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo htmlspecialchars($character['name']); ?>" required><br>

    <label for="role">Role:</label>
    <input type="text" name="role" value="<?php echo htmlspecialchars($character['role']); ?>" required><br>

    <label for="info">Info:</label>
    <textarea name="info" required><?php echo htmlspecialchars($character['info']); ?></textarea><br>

    <label for="image">Image:</label>
    <input type="file" name="image"><br>

    <input type="submit" value="Update Character">
    <a href="index.php?command=character#character-list">Cancel</a>
</form>
</div>
</section>



<?php include('footer.php'); ?>

</body>
</html>