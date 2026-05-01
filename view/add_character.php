<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Character</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript">
        function imagePreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("previewImage");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function resetForm() {
            var preview = document.getElementById("previewImage");
            preview.style.display = "none"; // Hide the image preview when the reset button is clicked
        }
    </script>
    <style type="text/css">
        input[type="file"] {
            display: none;
        }

        .custom-file-button {


            padding: 10px 20px;
            cursor: pointer;
            background-color: #f7728d;

            border-radius: 4px;
            text-align: center;
        }

        .image-preview {
            width: 100%;
            max-width: 300px;
            height: auto;
            display: none;
        }

        .image-preview-container {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        input[type="reset"] {
            background: none;
            border: none;
            color: #888888;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }

        input[type="reset"]:hover {
            color: #555555;
        }

        .cancel-reset-container a {
            margin-right: 270px;
        }
    </style>
</head>

<body>

    <section id="add_form" class="add">
        <div class="add_char">
            <form action="index.php?command=insertCharacter" method="POST" enctype="multipart/form-data">
                <h1>Add Character Details</h1>

                <label for="name">Name:</label>
                <input type="text" name="name" required><br>

                <label for="role">Role:</label>
                <input type="text" name="role" required><br>

                <label for="info">Info:</label>
                <textarea name="info" required></textarea><br>

                <label for="imageUpload" class="custom-file-button" style="border: 1px solid #ccc; color: #ffff;">Upload
                    Image</label>
                <input type="file" name="image" id="imageUpload" onchange="imagePreview(event)" accept="image/*"><br>

                <!-- Image Preview Container -->
                <div class="image-preview-container">
                    <img id="previewImage" class="image-preview" alt="Image Preview">
                </div>

                <!-- Submit and Reset Buttons -->
                <input type="submit" value="Save Character">
                <div class="cancel-reset-container"><a href="index.php?command=character#character-list">Cancel</a>
                    <input type="reset" value="Reset Form" onclick="resetForm()">
                </div>

            </form>
        </div>
    </section>
</body>

</html>