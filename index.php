<?php
  // Verbindung zur Datenbank herstellen

  include 'db_connection.php';
  $conn = OpenCon();
  echo "Connected Successfully";
  CloseCon($conn);

  // Funktion zum Geocache hochladen

  // Geocachedaten aus der Datenbank abrufen

  // Geocachedaten hochladen (wird von JavaScript aufgerufen)
?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdoptAGeo</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #252525;
            color: rgb(255, 255, 255);
        }

        header {
            background-color: #558a55;
            padding: 20px 0;
            text-align: center;
            color: #f7b87d;
        }

        h1 {
            margin: 0;
            font-size: 2em;
        }

        nav {
            background-color: #5d9b5d;
            overflow: hidden;
        }

        nav a {
            float: left;
            display: block;
            color: #ffffff;
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

        .home-img{
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 50px;
            margin-top: 55px;
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
            background-color: #4d6f4d;
        }


        #geocacheForm {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #252525; /* Überschriften in Schwarz */
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
            background-color: #4caf50;
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
    <h2>Welcome to the "adopt a geocache" System!</h2>
    <p>Discover the allure of geocaching: adopt hidden treasures with rich histories or share your own adventures by putting caches up for adoption!</p>
    <img class="home-img" src="img/Background.jpg" alt="Geocache Image">
    <footer>
        <div class="container">
            <p>  || You can adopt a cache with the GC-code here: <a href="https://www.geocaching.com/adopt/">Geocaching.com/adopt</a> || </p>
            <p>  || programming this since December 2023 ||</p>
        </div>
    </footer>
</section>

<section id="viewAllPage" class="subpage">
    <h2>View All Geocaches</h2>
    <div id="geocacheList"></div>
</section>

<section id="uploadPage" class="subpage">
    <h2>Upload Geocache</h2>
    <p>Share your geocaching discoveries with the community.</p>
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
    <h2>Latest News</h2>
    <p>Stay updated with the latest geocaching information.</p>
    <img class="home-img" src="img/geocache-398016_1280.jpg" alt="Latest News Geocache Image">
</section>

<section id="documentationPage" class="subpage">
    <h2>Documentation</h2>
    <h3>How to:</h3>
    <p>Explore a nearby geocache that appeals to you. Copy the provided code<br> and visit the website mentioned in the description. 
        Input the code into the designated field and submit <br>an adoption request. Following this, the owner of the cache will receive a notification to approve your inquiry. 
        Once all steps are completed,<br> you should find the geocache listed as owned on your Geocaching.com profile.
    </p>
    <footer>
        <div class="container">
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
