<?php
class Controller
{
    public $model = null; // Instantiate Model

    function __construct()
    {
        require_once('model/model.php'); // Load Model
        $this->model = new Model();  // Initialize Model
    }

    public function getPage()
    {
        $command = isset($_REQUEST['command']) ? $_REQUEST['command'] : null; // Get command
        $section = isset($_GET['section']) ? $_GET['section'] : null; // Get section

        switch ($command) {

            case 'home':
                include_once('view/main.php');
                if (!empty($section)) {
                    echo "<script>
                        document.addEventListener('DOMContentLoaded', function() {
                            window.location.hash = '#$section';
                        });
                    </script>"; // Script for Scrolling to Section (Parallax Website)
                }
                break;

            case 'character':
                $characters = $this->model->getCharacterList(); // Extract the characters in the database
                include_once('view/character.php');
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('header').classList.add('character-background');
                    });
                </script>"; // Script for changing background named 'character-background' in css
                break;

            case 'viewCharacter': //SPECIFIC CHARACTER DETAILS DISPLAY
                $character_id = isset($_GET['id']) ? $_GET['id'] : null; // Get character ID from request
                if ($character_id) {
                    $character = $this->model->getCharacterById($character_id); // Fetch character details
                    include_once('view/characterDetails.php');
                }
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('header').classList.add('background3');
                    });
                </script>"; // Script for changing background named 'background3' in css
                break;

            case 'deleteCharacter':
                $character_id = isset($_GET['id']) ? $_GET['id'] : null; // Get character ID from request
                if ($character_id) {
                    $character = $this->model->getCharacterById($character_id);
                    if ($character) {
                        $imagePath = $character['image_path']; // Get the image path
                        $result = $this->model->deleteCharacter($character_id); // Delete character by id "$character_id"

                        if (strpos($result, 'successfully') !== false && !empty($imagePath)) {
                            $fullImagePath = 'uploads/' . $imagePath; // Construct full path to image
                            if (file_exists($fullImagePath)) {
                                //unlink($fullImagePath); // Delete the file
                            }
                        }

                        echo "<script>
                            alert('" . $result . "');
                            window.location.href='index.php?command=character#character-list';
                        </script>"; // Script for redirecting back to 'character-list' after deleting
                    } else {
                        echo "<script>alert('Character not found.');</script>";
                    }
                }
                break;

            case 'editCharacter':
                $character_id = isset($_GET['id']) ? $_GET['id'] : null; // Get id from request
                if ($character_id) {
                    $character = $this->model->getCharacterById($character_id); // Fetch character details
                    include_once('view/edit_character.php');
                }
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('header').classList.add('background5');
                    });
                </script>";
                break;

            case 'saveCharacter': // Triggers in the edit_character.php
                $character_id = isset($_GET['id']) ? $_GET['id'] : null; // Get character ID from request
                if ($character_id) {
                    // Fetch current character details to get the current image path
                    $character = $this->model->getCharacterById($character_id);
                    $currentImagePath = $character['image_path']; // Store current image path

                    $name = $_POST['name'];
                    $role = $_POST['role'];
                    $info = $_POST['info'];
                    $uploadDir = "uploads/"; // Fixed directory for images

                    $filename = null;

                    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {  // Check if an image is uploaded and validate it
                        $imageFile = $_FILES["image"];
                        $imageFileName = basename($imageFile["name"]);
                        $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
                        $imageTempPath = $imageFile["tmp_name"]; // For files that do not come from the images/ directive

                        $check = getimagesize($imageTempPath); // Verify that the file is an image
                        if ($check === false) {
                            echo '<script>alert("File is not an image.");</script>'; // If not an Image
                            include 'view/edit_character.php';
                            break;
                        }

                        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']; // Allowed file types
                        if (!in_array($imageFileType, $allowedTypes)) {
                            echo '<script>alert("Only JPG, JPEG, PNG & GIF files are allowed.");</script>'; // If file type not allowed
                            include 'view/edit_character.php';
                            break;
                        }

                        if ($imageFile["size"] > 5000000) { // Size limit 5MB
                            echo '<script>alert("File is too large.");</script>'; // If file is too large
                            include 'view/edit_character.php';
                            break;
                        }

                        if (!empty($currentImagePath)) { // Delete old image if it exists
                            $oldImagePath = $uploadDir . $currentImagePath;
                            if (file_exists($oldImagePath)) {
                                unlink($oldImagePath); // Delete old image file
                            }
                        }

                        do {
                            $uniqueName = uniqid() . '.' . $imageFileType; // To avoid overwrites and duplicates
                            $targetPath = $uploadDir . $uniqueName;
                        } while (file_exists($targetPath));

                        if (true) { // <-- FORCED TRUE FOR VERCEL MOCK
                            $filename = $imageFileName;
                        } else {
                            echo '<script>alert("Error uploading your file.");</script>'; // If upload is unsuccessful
                            include 'view/edit_character.php';
                            break;
                        }
                    } else {
                        $filename = $currentImagePath; // If no new image uploaded, keep the current filename
                    }

                    $this->model->updateCharacter($character_id, $filename, $name, $role, $info); // Update character via Model function
                    echo '<script>alert("Character updated successfully!");</script>';
                    header("Location: index.php?command=character#character-list");
                    exit();
                }
                break;

            case 'addCharacter':
                include 'view/add_character.php';
                echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        document.querySelector('header').classList.add('background4');
                    });
                </script>"; // Script for changing background named 'background4' in css
                break;

            case 'insertCharacter': // Triggers in the add_character.php
                $name = $_POST['name'];
                $role = $_POST['role'];
                $info = $_POST['info'];
                $uploadDir = "uploads/"; // Fixed directory for images

                if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) { // Check if an image is uploaded and validate it
                    $imageFile = $_FILES["image"];
                    $imageFileName = basename($imageFile["name"]);
                    $imageFileType = strtolower(pathinfo($imageFileName, PATHINFO_EXTENSION));
                    $imageTempPath = $imageFile["tmp_name"]; // For files that does not come from the uploads/ directive

                    $check = getimagesize($imageTempPath); // Verify that the file is an image
                    if ($check === false) {
                        echo '<script>alert("File is not an image.");</script>';
                        include 'view/add_character.php';
                        break;
                    }

                    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif']; // Check for allowed file types
                    if (!in_array($imageFileType, $allowedTypes)) {
                        echo '<script>alert("Only JPG, JPEG, PNG & GIF files are allowed.");</script>';
                        include 'view/add_character.php';
                        break;
                    }

                    if ($imageFile["size"] > 5000000) { // Check for file size limit (5MB)
                        echo '<script>alert("File is too large.");</script>';
                        include 'view/add_character.php';
                        break;
                    }

                    if (strpos($imageFileName, 'uploads/') === 0) { // Determine if the image is already in the images/ directory
                        $filename = $imageFileName;  // Image is already in the images/ directory, use it directly
                    } else { // Image is from a different directory, copy it to images/
                        $targetPath = $uploadDir . $imageFileName; // Use original filename

                        if (true) { // Move file to target path
                            $filename = $imageFileName; // Use original filename after moving
                        } else {
                            echo '<script>alert("Error uploading your file.");</script>';
                            include 'view/add_character.php';
                            break;
                        }
                    }

                    $result = $this->model->addCharacter($filename, $name, $role, $info); // Add the character via Model function
                    echo '<script>alert("' . $result . '");</script>';
                    header("Location: index.php?command=character#character-list");
                    exit();
                } else {
                    echo '<script>alert("No image uploaded or upload error.");</script>';
                    include 'view/add_character.php';
                }
                break;

            case 'searchCharacter':
                $name = isset($_GET['name']) ? $_GET['name'] : '';
                $characters = $this->model->searchCharacter($name); // Perform search via Model function
                include_once('view/character.php');
                break;

            default:
                include_once('view/main.php');
        }
    }

}
?>