<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bocchi the Rock!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link href="https://fonts.cdnfonts.com/css/promises-gisttela-script" rel="stylesheet">
    <link rel="icon" href="images/bocchiicon.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<footer>
    <div class="social-links">
        <a href="https://www.facebook.com/BocchiTheRock.AnimeSaiko/">
            <img src="images/fb.svg" alt="Facebook" class="social-icon">
        </a>
        <a href="https://x.com/btr_anime">
            <img src="images/twitter.svg" alt="Twitter" class="social-icon">
        </a>
        <a href="https://www.instagram.com/btr_anime/?hl=en">
            <img src="images/ig.svg" alt="Instagram" class="social-icon">
        </a>
        <a href="https://www.youtube.com/watch?v=e876f6PKblo">
            <img src="images/yt.svg" alt="YouTube" class="social-icon">
        </a>
    </div>
    <p>Andrey & Aeron, 2022 Bocchi the Rock!, All Rights Reserved.</p>
</footer>


<!-- Back to Top Text Button -->
<div class="back-to-top" id="backToTop">Back to Top</div>


<script>
    const backToTop = document.getElementById("backToTop");

    // Show/Hide the Back to Top Button
    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            backToTop.style.display = "block";
        } else {
            backToTop.style.display = "none";
        }
    });

    // Scroll to the top when the button is clicked
    backToTop.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth" // Smooth scroll effect
        });
    });
</script>


</body>

</html>