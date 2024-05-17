<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdoptAGeo</title>

    <style>
        .basicwriting{
            color: #436850
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #FBFADA;
            color: rgb(255, 255, 255);
        }

        header {
            background-color: #12372A;
            padding: 20px 0;
            text-align: center;
            color: #FBFADA;
        }

        h1 {
            margin: 0;
            font-size: 2em;
        }

        nav {
            background-color: #436850;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #D2E3C8;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        nav a:hover {
            background-color: #4d6f4d;
        }

        nav a:nth-child(5) {
            float: right;
        }

        section {
            padding: 40px 20px;
            text-align: center;
        }

        .subpage {
            display: none;
        }

        .active {
            display: block;
        }

        .home-img {
            width: 500px;
            height: 500px; /* Hier die gewünschte Höhe einstellen */
            margin-top: 5px;
            margin-left: 5px;
        }



        button {
            background-color: #558a55;
            color: #ffffff;
            padding: 10px 20px;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #526D82;
        }


        #geocacheForm {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;<
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #436850; /* Überschriften in Schwarz */
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.upload-btn {
            background-color: #12372A;
            color: #fff;
            padding: 10px 15px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.upload-btn:hover {
            background-color: #45a049;
        }

        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 10px;
            margin-top: 20px;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 5px;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }


    </style>
</head>
<body>

<header>
    <h1>Adopt a Geocache</h1>
</header>

<nav>
    <a href="#home" onclick="showPage('homePage')">Home</a>
    <a href="#view all" onclick="showPage('viewAllPage')">view all geocaches</a>
    <a href="#upload" onclick="showPage('uploadPage')">Upload</a>
    <a href="#news" onclick="showPage('newsPage')">News</a>
    <a href="#account" onclick="showPage('accountPage')">Account</a>
    <a href="#documentation" onclick="showPage('documentationPage')">Documentation</a>
    

</nav>

<section id="homePage" class="subpage active">
    <div class="basicwriting">
        <h1>Welcome to the "adopt a geocache" System!</h1>
        <h2>pictures of the week:</h2>
    </div>

    <div class="gallery">
        <div class="gallery-item">
            <img src="img/Geocaching_04.jpg" alt="Geocache Image">
        </div>
        <div class="gallery-item">
            <img src="img/Background.jpg" alt="Geocache Image">
        </div>

        <!-- Weitere Bilder hier einfügen -->
    </div>
    <footer>
        <div class="container">
            <p>  || programming this since December 2023 ||</p>
        </div>
    </footer>
</section>

<section id="viewAllPage" class="subpage">
    <div class="basicwriting">
        <h2>View All Geocaches</h2>
    </div>
</section>

<section id="uploadPage" class="subpage">
    <div class="basicwriting">
        <h2>Upload Geocache</h2>
        <p>Share your geocaching discoveries with the community.</p>
    </div>

    <form id="geocacheForm">
        <div>
            <label for="geocacheName"><strong>Geocachename:</strong></label>
            <input type="text" id="geocacheName" name="geocacheName" required>
        </div>
    
        <div>
            <label for="geocacheCode"><strong>Geocachecode:</strong></label>
            <input type="text" id="geocacheCode" name="geocacheCode" required>
        </div>
    
        <div>
            <label for="size"><strong>size:</strong></label>
            <input type="text" id="size" name="size" required>
        </div>
    
        <div>
            <label for="coordinates"><strong>coordinates:</strong></label>
            <input type="text" id="coordinates" name="coordinates" required>
        </div>
    
        <div>
            <label for="short description"><strong>short description:</strong></label>
            <input type="url" id="link" name="link">
        </div>
    
        <div style="text-align: center;">
            <button class="upload-btn" type="button" onclick="uploadGeocache()">Upload</button>
        </div>
    </form>
    
     
</section>

<section id="accountPage" class="subpage">
    <h2>User Account</h2>
    <p>Welcome to your account page!</p>

</section>


<section id="newsPage" class="subpage">
    <div class="basicwriting">
        <h2>Latest News</h2>
        <p>Stay updated with the latest geocaching information.</p>
    </div>
</section>

<section id="documentationPage" class="subpage">
    <div class="basicwriting">
        <h2>Documentation</h2>
        <h3>How to:</h3>
        <p>Explore a nearby geocache that appeals to you. Copy the provided code<br> and visit the website mentioned in the description. 
            Input the code into the designated field and submit <br>an adoption request. Following this, the owner of the cache will receive a notification to approve your inquiry. 
            Once all steps are completed,<br> you should find the geocache listed as owned on your Geocaching.com profile.
        </p>
    </div>

    <footer>
        <div class="basicwriting">
            <p>  || programming this since December 2023 ||</p>
        </div>
    </footer>

</section>



<script>

    //Sup-Seiten werden versteckt
    function showPage(pageId) {
        var subpages = document.getElementsByClassName('subpage');
        for (var i = 0; i < subpages.length; i++) {
            subpages[i].classList.remove('active');
        }
        var selectedPage = document.getElementById(pageId);
        selectedPage.classList.add('active');
    }

        // Funktion zum Hochladen des Geocaches (JavaScript)

        // AJAX-Anfrage an den Server senden

        // Seite neu laden, um die aktualisierten Geocaches anzuzeigen

    </script>
</body>
</html>
