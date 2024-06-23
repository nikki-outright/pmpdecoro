<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hero Slideshow</title>
    <style>
        /* Add some basic styling */
        .hero-slideshow {
            position: relative;
            width: 100%;
            overflow: hidden;
            background-color: #13392c;
        }
        .slide {
            display: none;
            position: absolute;
            width: 100%;
            height: 750px; /* Adjust based on screen size */
            background-size: cover;
            background-position: center;
            color: #ffffff;
            text-align: center;
        }
        .slide-content {
            position: absolute;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: rgba(0, 0, 0, 0); /* Adjust as necessary */
        }
        .slide-heading {
            font-size: 55px;
        }
        .slide-sub-heading-2 {
            color: #a49268;
        }
        .multiple-buttons {
            margin-top: 20px;
        }
        .slide-button {
            background-color: #ffffff;
            color: #333333;
            padding: 10px 20px;
            text-decoration: none;
            margin: 0 10px;
            border: 1px solid #a49268;
        }
        .slide-button:hover {
            background-color: #a49268;
            color: #ffffff;
        }
        .active {
            display: block;
        }
    </style>
</head>
<body>

<div class="hero-slideshow">
    <div class="slide active" style="background-image: url('public/images/: 1jpg;');">
        <div class="slide-content slider-content--middle-center slider-content--text-center">
            <div class="slide-heading h2">Limited Edition For Home Interior Design</div>
            <span class="slide-sub-heading-2 theme_main_subheading">EXTRA -10% OFF WITH CODE: HOOKER001</span>
            <div class="multiple-buttons">
                <a href="{{ url('/collections') }}" class="button slide-button theme_buttons" aria-label="Shop now">Shop now</a>
                <a href="{{ url('/collections') }}" class="button slide-button theme_buttons secondary" aria-label="All collection">All collection</a>
            </div>
        </div>
    </div>
    <div class="slide" style="background-image: url('public/images/: 1jpg;');">
        <div class="slide-content slider-content--middle-center slider-content--text-center">
            <div class="slide-heading h2">Furnish Your Dream With Our Furniture</div>
            <span class="slide-sub-heading-2 theme_main_subheading">EXTRA -10% OFF WITH CODE: HOOKER001</span>
            <div class="multiple-buttons">
                <a href="{{ url('/collections') }}" class="button slide-button theme_buttons" aria-label="Shop now">Shop now</a>
                <a href="{{ url('/collections') }}" class="button slide-button theme_buttons secondary" aria-label="All collection">All collection</a>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript for slideshow functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('active', i === index);
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    setInterval(nextSlide, 1000); // Change every 1 second, adjust as needed

    // Optionally add arrow functionality and other features as needed
</script>

</body>
</html>
