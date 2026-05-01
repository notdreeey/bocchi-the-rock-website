<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bocchi the Rock!</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <section id="character-list" class="character-list">
        <div class="character-container">

            <h2>Characters</h2>

            <!-- SEARCH FORM -->
            <section id="search-character">
                <form action="index.php#character-list" method="get">
                    <input type="hidden" name="command" value="searchCharacter">
                    <input type="hidden" name="section" value="character">
                    <div class="search-container">
                        <input type="text" name="name" placeholder="Enter character name"
                            value="<?= isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '' ?>"
                            class="search-input">
                        <button type="submit" class="search-button">Search</button>
                    </div>
                </form>
            </section>

            <?php
            require_once('model/model.php');
            $model = new Model();

            // Check if a search was performed
            if (isset($_GET['name']) && !empty($_GET['name'])) {
                // If search is done, display "Search Results" heading
                $characters = $model->searchCharacter($_GET['name']);
                echo "<h3>Search Results:</h3>";
            } else {
                // If no search, show all characters
                $characters = $model->getCharacterList();
                echo "<h3>All Characters:</h3>";
            }
            ?>

            <!-- CHARACTER SECTION -->
            <div class="character-grid">
                <?php if (!empty($characters)): ?>
                    <?php foreach ($characters as $character): ?>
                        <div class="character-item">
                            <img src="uploads/<?= htmlspecialchars($character->image_path) ?>"
                                alt="<?= htmlspecialchars($character->name) ?>" class="character-image">
                            <h3>
                                <a href="index.php?command=viewCharacter&id=<?= htmlspecialchars($character->id) ?>#char-sc">
                                    <?= htmlspecialchars($character->name) ?>
                                </a>
                            </h3>
                            <div class="character-actions">
                                <a
                                    href="index.php?command=editCharacter&id=<?= htmlspecialchars($character->id) ?>#add_form">Edit</a>
                                |
                                <a href="index.php?command=deleteCharacter&id=<?= htmlspecialchars($character->id) ?>"
                                    onclick="return confirm('Are you sure you want to delete this character?')">Delete</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No characters found.</p>
                <?php endif; ?>
            </div>

            <!-- BACK TO CHARACTER LIST BUTTON -->
            <?php if (isset($_GET['name']) && !empty($_GET['name'])): ?>
                <div class="back-button">
                    <a href="index.php?command=character#character-list" class="button" style="color: white">Back to
                        Character List</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

</body>

</html>