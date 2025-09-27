<?php
include('navbar-en.php');
include('admin-en.php');

$sql = "SELECT make, model, type, price, image FROM voiture";
$result = $conn->query($sql);

// Fetch cars and encode them as JSON for JavaScript
$cars = [];
while ($row = $result->fetch_assoc()) {
    $cars[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Cars</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <!-- Bootstrap Animations -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Footer -->
    <link href="Footer.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>

        body {
            overflow-x: hidden;
        }

        .image-container {
            width: 100%;
            height: 250px; 
            overflow: hidden; /* Prevents zoom from expanding beyond */
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        /* change width here to make car bigger or smaller */
        .card-img-top {
            height: auto;
            width: 120%;
            object-fit: contain;
            /* width: 100%; */
            /* object-fit: cover; */
            transition: transform 0.3s ease; /* Smooth zoom transition */
        }

        .card {
            height: 450px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
        }
        
        .card-bg {
            background-color: #E5E4E2;
        }

        @media (max-width: 987px) {
            .card-img-top {
                height: 200px;
            }
        }

        /* Allow cards to spread better on large screens */
        @media (min-width: 1440px) and (max-width: 2560px) {
            .container {
                max-width: 85vw;
            }
            .card-img-top {
                height: 300px;
            }
            .card-body {
                height: 26vh;
            }
        }

        @media (min-width: 2560px) {
            .container {
                max-width: 88vw;

            }
            .card-img-top {
                min-height: 250px;
            }
            .x2{
                padding-left: 12px;
                margin-inline-start: 10px;
            }
            .sidefilter {
                min-width: 200px;
                margin-left: 70px;
                /* padding-left: 100px; */
                z-index: 100;
            }

            .custom-navbar .x6{
                width: 50vw;
            }

            .btn-crimson {
                margin-bottom: 0 !important;
            }
        }


        .col-md-4:hover .card-img-top {
            transform: scale(1.1);
        }

        .btn-crimson {
            background-color: crimson;
            color: white;
            border: none;
            border-radius: 10px;
            padding: 10px;
            transition: all 0.5s ease-in-out;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: -60px;
        }

        .btn-crimson:hover {
            background-color: #d62828;
            color: white;
            /* border-color: crimson; */
            box-shadow: inset 0px 5px 8px rgba(0, 0, 0, 0.5), inset 0px -8px 8px rgba(255, 255, 255, 0.2);
            transform: scale(1.01);
        }

        .btn-crimson:active {
            background-color: #2F4F4F !important;
            color: white !important;
            box-shadow: inset 0px 5px 8px rgba(15, 55, 57, 0.9);
            transform: scale(0.98);
            transition: transform 0.3s ease-in; 
        }

        .btn-outline-crimson {
            color: #101010;
            border-color: white;
            border: 2px solid crimson;
            transition: 0.3s ease-in-out;
        }

        .btn-outline-crimson:hover {
            background-color: crimson;
            color: white;
        }

        /* Style the filter select boxes */
        .form-select {
            background-color: #F2F2F2;
            color: #101010;
            border: 0px solid crimson;
            border-radius: 10px;
            padding: 8px;
            transition: 0.3s ease-in-out;
        }

        /* Remove default focus outline (light blue) */
        .form-select:focus {
            background-color: #2F4F4F;
            color: white;
            border: 2px solid #fac623;
            box-shadow: none !important;
        }

        .form-select:hover {
            cursor: pointer;
        }

        .form-select .li:hover {
            color: #fac623;
        }

        /* Style the dropdown menu (for sorting) */
        .dropdown-menu1 {
            /* background-color: #101010;
            border-radius: 10px;
            border: 2px solid crimson;
            padding: 5px 0;
            list-style: none;
            margin-top: 0 !important;
            z-index: 1050 !important;
            overflow: visible;
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            display: none; */
            /* position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            background-color: #101010;
            border-radius: 10px;
            border: 2px solid crimson;
            padding: 5px 0;
            list-style: none;
            display: none; */
            z-index: 9999 !important; 
            position: absolute !important;
            top: 100% !important;
            left: 0 !important;
            background-color: #101010 !important;
            border-radius: 10px;
            border: 0px solid crimson;
            /* padding: 5px 0; */
            list-style: none;
            display: none;
        }

        .dropdown.show .dropdown-menu1 {
            display: block !important;
        }

        /* Style dropdown items */
        .dropdown-menu1 .dropdown-item1 {
            color: white;
            padding: 8px 15px;
            transition: 0.3s ease-in-out;
            text-align: center !important;
        }

        /* Hover effect for dropdown items */
        .dropdown-menu1 .dropdown-item1:hover {
            background-color: crimson;
            color: white;
            cursor: pointer;
        }


                
/* Start Navbar */
    /* Custom Navbar */
    .custom-navbar {
        background-color: #101010; /* Dark Background */
        padding: 15px 0;
        width: 100vw;
        overflow: hidden;
        height: 66px;
        z-index: 1000 !important;
    }

    .navbar {
        position: sticky;
        z-index: 1000 !important;
        overflow: visible !important;
        background-color: #101010;
    }

    /* Navbar Brand */
    .navbar-brand {
        font-size: 1.5rem;
        color: white;
        display: flex;
        align-items: center;
    }

    /* Logo Styling */
    .navbar-logo {
        height: 40px;
        padding-right: 5px;
        width: auto;
        margin-right: 10px;
    }

    /* Nav Links */
    .navbar-nav .nav-link {
        color: white !important;
        font-size: 1rem;
        transition: color 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        color: crimson !important;
    }

    /* Active Link */
    .navbar-nav .nav-link.active {
        color: crimson !important;
        font-weight: bold;
    }

    /* Search Bar */
        .search{
            margin-bottom: auto;
            margin-top: auto;
            height: 30px;
            background-color: #fff;
            border-radius: 40px;
            padding: 10px;
        }

        .search_input{
            color: crimson;
            border: 0;
            outline: 0;
            background: none;
            width: 0;
            margin-top:-4.5px;
            caret-color:#101010;
            line-height: 5px;
            transition: width 0.4s linear;
            font-size: small;
            display:flex;
            align-items: center;
        }

        /* Remove the outline (light blue border) on focus */
        .search_input:focus {
            outline: none !important;
            border: none !important;  
            box-shadow: none !important;
        }

        .search .search_input{
            padding: 0 10px;
            width: 250px;
            caret-color:#E5E4E2;
            transition: width 0.4s linear;
        }
            
        .search:hover > .search_icon{
            background: white;
            color: #fff;
            transition: ease 0.3s;
        }

        .search_icon{
            height: 27px;
            width: 27px;
            float: right;
            margin-top: -21px;
            margin-right: -7px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            color:white;
            background-color:crimson;
            border: none !important;
        }

        .sear-img {
        height: 80%;
        width: 80%;
        }
            
        a:link{
            text-decoration:none;
        }  

        #searchCar:focus {
            width: 250px;
            transition: width 0.4s linear;
            border: none !important;
        }
        #searchCar.search_input:focus{
            border: none !important;
        }

        /* Search Suggestions */
        .search-suggestions {
            position: absolute;
            background-color: white;
            border: 1px solid #ccc;
            border-radius: 10px;
            transform: translateX(-3.5%);
            width: 100%;
            max-width: 300px;
            max-height: 200px;
            overflow-y: hidden;
            display: none;
            z-index: 1050;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            top: 110%; 
        }

        .search-suggestions div {
            padding: 8px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-suggestions div:hover {
            background-color: #fac623; /* Highlight on hover */
            color: #101010;
        }
        
    /* End Search */

        .lang-but {
            border: none;
            margin-right: 5%;
            padding: 0;
            background: #101010;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lang-but img {
            /* height: 100%;
            width: 100%; */
            height: 35px; 
            width: auto;  
            border-radius: 40px; 
            transition: transform 0.2s ease-in-out; 
        }

        .lang-but:hover img {
            transform: scale(1.0); /* Slight zoom on hover */
        }
        

        /* Buttons */
        .btn-light {
            background-color: #E5E4E2;
            color: #101010;
            border: none;
            transition: 0.3s;
        }

        .btn-light:hover {
            background-color: crimson;
            color: white;
        }

        /* General Dropdown Styling*/
        .dropdown {
            display: flex;
            align-items: center;
            position: relative;
        }

        /* Style for both Language and Account Buttons */
        .navbar .btn-light,
        .navbar .btn-outline-light {
            background-color: #101010;
            color: white;
            border: 2px solid white;
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 1.5s;
        }

        /* Hover Effects */
        .navbar .btn-light:hover,
        .navbar .btn-outline-light:hover {
            background-color: crimson;
            color: white;
            border-color: #101010;
        }

        /* Remove the focus outline on the Account button */
        .btn-outline-light:focus, 
        .btn-outline-light:active, 
        .btn-outline-light:focus-visible {
            outline: none !important;
            box-shadow: none !important;
            border-color: white !important; /* Keeps border consistent */
        }


        /* Make dropdown width adjust dynamically */
        .dropdown-menu {
            background-color: #F2F2F2;
            color: #101010 !important;
            /* border: none; */
            display: none;
            margin: 0 auto;
            text-align: center;
            min-width: 90px !important;
            /* padding: 5px 8px; */
            border-radius: 10px !important; 
            width: auto; 
        }

        /* Adjust dropdown positioning */
        .dropdown-menu[data-bs-popper] {
            left: 50% !important;
            transform: translateX(-50%) !important;
        }


        /* Dropdown Items */
        .dropdown-item {
            padding: 5px 10px;
            text-align: center !important;
            font-size: 14px;
        }

        .dropdown-item ul {
            background-color: crimson;
        }

        .dropdown-menu li a{
            margin: 0 auto;
            padding: 5px;
            width: 80%;
            display: block; /* Make the item a block to fill the width */
        }

        .dropdown-menu.show .dmenu {
            display: flex;
            align-items: center;
            border: none;
        }

        .dropdown-menu.show {
            z-index: 9999 !important;
            overflow: visible !important;
        }

        .dropdown-menu.show ul{
            display: block;
            width: 40px !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .navbar-nav {
                text-align: center;
                padding-top: 10px;
            }

            /* Full width for dropdowns on small screens */
            .dropdown,
            .search-input,
            .lang-but {
                width: 100%;
                display: flex;
                justify-content: center;
                padding-top: 15px;
            }

            .navbar {
                background-color: #101010 !important; /* Dark background */
            }

            .x6 {
                background-color: #101010;
            }
        }

        .dropdown-item1 {
        display: block;
        width: 100% !important;
        /* padding: 10px; */
        clear: both;
        font-weight: 400;
        color: var(--bs-dropdown-link-color);
        text-align: center !important;
        text-decoration: none;
        white-space: nowrap;
        background-color: #101010;
        border: 0;
        font-size: 14px;
        }

        .dropdown-item1:hover {
        color: var(--bs-dropdown-link-hover-color);
        text-decoration: none;
        background-color: var(--bs-dropdown-link-hover-bg);
        }

        .dmenu {
            width: 100%;
            z-index: 999 !important;
        }
        /* End Buttons */

    /* End Dropdown */

    /* Responsive Navbar */
    @media (max-width: 992px) {
        .navbar-nav {
            text-align: center;
            padding-top: 10px;
        }
        .dropdown, .search-input {
            width: 100%;
        }
    }
/* End Navbar */


/* Start SideFilter */
    .sidefilter {
        background-color: #F2F2F2;
        padding: 15px;
        border-radius: 0px;
        height: auto;
        width: 250px;
        position: sticky;
        top: 0;
        z-index: 999;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .x2 {
        display: flex;
        justify-content: space-between;
    }

    .x3{
        width: 100%;
    }

    @media (min-width: 2560px) {
            .sidefilter {
                width: 250px;
                height: 100%;
                margin-bottom: 20vh;
                position: fixed;
                padding-top: 425px;
            }
        }

    @media (min-width: 1024px) and (max-width: 1440px) {
        .sidefilter {
            height: 100%;
            margin-left: -12vh;
            margin-bottom: 20vh;
            position: fixed;
            padding-top: 225px;
        }

        .image-container {
            height: 200px;
        }
        .card-img-top {
            height: 200px;
        }

        /* .navbar {
            width: 110% !important;
        } */

        #carContainer {
            width: 75vw;
        }
        
    }
    
    @media (min-width: 987px) and (max-width: 1024px) {
        .sidefilter {
            height: 100%;
            width: 190px;
            margin-left: -5vh;
            margin-bottom: 20vh;
            position: fixed;
            padding: 8px;
            padding-top: 200px;
        }
        
    }

    @media (max-width: 987px) {
    .x2 {
        flex-direction: column; 
    }

    .sidefilter {
        width: 50% !important;
        margin: 0 auto;
        margin-bottom: 15px;
        padding: 10px;
        }

        .col-12 {
            margin-bottom: 15px; 
        }

        .w-100 {
            width: 100% !important; 
        }
    }

    @media (min-width: 768px) and (max-width: 987px) {
        /* Stack the sidefilter on top */
        .container .row {
            flex-direction: row; 
        }

        .sidefilter {
            width: 100%; 
            padding: 10px;
            align-items: normal;
        }

        .col-12 {
            margin-bottom: 15px;
        }

        .w-100 {
            width: 100% !important; 
        }

        .image-container {
            height: 200px;
        }

        .x7 {
            display: flex;
            align-items: center;
        }

        #carContainer {
            width: 100vw;
        }
    }

    @media (max-width: 768px) {
        .image-container {
            height: 200px;
        }
        .card-img-top {
            height: 200px;
        }
    }

    @media (min-width: 768px) and (max-width: 1024px) {
    .card {
        font-size: small;
    }

    .card h5 {
        font-size: medium;
    }

    .card p {
        font-size: small;
    }

    .card .card-text span {
        font-size: medium !important;
    }

    .card .btn {
        font-size: small;
    }

    .card .btn-explore {
        height: 34px;
    }
}


    .txt-color{
        color: crimson;
    }

    .btn-explore {
        background-color: #fac623;
        /* margin-top: -10px; */
        position: relative;
        height: 38px;
        top: 5px;
    }

    .btn-explore:hover {
        background-color: #ebb000;
        box-shadow: inset 0px 5px 8px rgba(0, 0, 0, 0.5), inset 0px -8px 8px rgba(255, 255, 255, 0.2);
        transform: scale(1.01);
    }

    .btn-explore:active {
            background-color: #ebb000 !important;
            box-shadow: inset 0px 5px 8px rgba(15, 55, 57, 0.9);
            transition: transform 0.3s ease-in; 
        }

    /* Start Footer */
    footer {
        background-color: #f2f2f2;
        color: #101010;
        text-align: center;
        padding: 45px;
        width: 100%;
    }

    footer a {
        display: inline-block;
        text-decoration: none;
        color: #101010;
        margin: 10px;
        padding: 10px;
        border-radius: 50%;
    }

    footer a:hover {
        border: 1px solid rgb(207, 212, 178);
        color: crimson;
    }

    /* End Footer */

    /* SideKick CSS */
    .sidebark {
        position: fixed;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 60px;
        height: auto;
        background: rgba(26, 26, 26, 0.9);
        border-radius: 10px 0 0 10px;
        transition: width 0.3s ease;
        overflow: hidden;
        box-shadow: -2px 2px 10px rgba(0, 0, 0, 0.5);
        z-index: 9999;
        }

        .sidebark:hover {
            width: 200px;
        }

        .sidebark a {
            display: flex;
            align-items: center;
            color: white;
            padding: 15px;
            text-decoration: none;
            transition: background 0.3s ease;
            white-space: nowrap;
        }

        .sidebark a:hover {
            background: crimson;
            color: #101010;
        }

        .sidebark a i {
            font-size: 20px;
            margin-right: 15px;
        }

        .sidebark span {
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .sidebark:hover span {
            opacity: 1;
        }

    /* End Sidekick */

    </style>
    <script>
        let allCars = <?php echo json_encode($cars); ?>;
        // [
        //     { make: "Aston Martin", model: "DB12 Volante",   type: "Cabriolet",  price: "€275,000", image: "Voiture_Images/db12_cabriolet.webp"},
        //     { make: "Aston Martin", model: "DBX",            type: "SUV",        price: "€250,000", image: "Voiture_Images/DBX2.webp" },
        //     { make: "Aston Martin", model: "Valour",         type: "Coupe",      price: "€275,000", image: "Voiture_Images/valour.webp" },
        //     { make: "Aston Martin", model: "Vanquish",       type: "Coupe",      price: "€200,000", image: "Voiture_Images/vanquish1.webp"},
        //     { make: "Aston Martin", model: "Vantage",        type: "Coupe",      price: "€175,000", image: "Voiture_Images/vantage_coupe.webp"},
        //     { make: "Maserati",     model: "Ghibli",         type: "Sedan",      price: "€225,000", image: "Voiture_Images/ghibli1.webp" },
        //     { make: "Maserati",     model: "GT2 Stradale",   type: "Coupe",      price: "€400,000", image: "Voiture_Images/gt2_stra1.webp" },
        //     { make: "Maserati",     model: "Levante",        type: "SUV",        price: "€190,000", image: "Voiture_Images/Levante1.webp" },
        //     { make: "Maserati",     model: "MC20 Cielo",     type: "Cabriolet",  price: "€210,000", image: "Voiture_Images/MC202.webp" },
        //     { make: "Maserati",     model: "Quattroporte",   type: "Sedan",      price: "€175,000", image: "Voiture_Images/quattro11.webp" },
        //     { make: "Porsche",      model: "Cayenne GTS",    type: "SUV",        price: "€200,000", image: "Voiture_Images/cayenne_gts1.png" },
        //     { make: "Porsche",      model: "911 Turbo S",    type: "Coupe",      price: "€325,000", image: "Voiture_Images/911turbo_s1.png" },
        //     { make: "Porsche",      model: "911 GT3 RS",     type: "Coupe",      price: "€600,000", image: "Voiture_Images/911gt3rs1.png" },
        //     { make: "Porsche",      model: "Taycan",         type: "Sedan",      price: "€400,000", image: "Voiture_Images/taycan1.png" },
        //     { make: "Porsche",      model: "Panamera",       type: "Sedan",      price: "€350,000", image: "Voiture_Images/panamera1.png" }
        // ];
        
function displayCars(cars) {
    const container = document.getElementById("carContainer");
    container.innerHTML = "";

    cars.forEach(car => {
        // Format model name for URL
        const formattedModel = encodeURIComponent(car.model);

        const carCard = `<div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <div class="image-container">
                    <img src="${car.image}" class="card-img-top card-bg" alt="${car.make} ${car.model}">
                </div>
                <div class="card-body">
                    <h5 class="card-title pb-2">${car.make} ${car.model}</h5>
                    <p class="card-text">Type: ${car.type}</p>
                    <div class="d-flex justify-content-between">
                        <p class="card-text fw-bold">Price:<br /> 
                            <span style="font-size: large;">${car.price}</span>
                        </p>
                        <a href="essai-en.php?car=${formattedModel}&make=${encodeURIComponent(car.make)}&model=${formattedModel}" 
                           class="btn btn-explore w-60">
                            <img src="Voiture_Images/wheel1.svg" style="height:20px; position: relative; top:-2px;"> 
                            Test Drive
                        </a>
                    </div>
                    
                    <a href="Explore-en.php?car=${formattedModel}" class="btn btn-crimson w-100">Explore</a>
                </div>
            </div>
        </div>`;

        container.innerHTML += carCard;
    });
}

        function filterCars() {
            const make = document.getElementById("filterMake").value.toLowerCase();
            const type = document.getElementById("filterType").value.toLowerCase();
            let search = document.getElementById("searchCar").value.toLowerCase(); // Get search input

            // Get car from URL if exists
            const urlParams = new URLSearchParams(window.location.search);
            const selectedCar = urlParams.get("car");

            if (selectedCar && !search) {
                search = selectedCar.toLowerCase(); // Use URL parameter if search bar is empty
            }

            const filtered = allCars.filter(car => 
                (make === "" || car.make.toLowerCase().includes(make)) &&
                (type === "" || car.type.toLowerCase().includes(type)) &&
                (search === "" || (car.make + " " + car.model).toLowerCase().includes(search))
                // (search === "" || (`${car.make} ${car.model}`).toLowerCase().includes(search))
            );

            displayCars(filtered);
        }

        
        function populateFilters() {
            const makes = [...new Set(allCars.map(car => car.make))];
            const types = [...new Set(allCars.map(car => car.type))];
            document.getElementById("filterMake").innerHTML += makes.map(m => `<option value="${m}">${m}</option>`).join(" ");
            document.getElementById("filterType").innerHTML += types.map(t => `<option value="${t}">${t}</option>`).join(" ");
        }
        
        function clearFilters() {
            document.getElementById("filterMake").value = "";
            document.getElementById("filterType").value = "";
            document.getElementById("searchCar").value = "";
            displayCars(allCars);
        }

        function sortCars(by, ascending) {
            const sortedCars = [...allCars].sort((a, b) => {
                if (by === "name") {
                    return ascending ? a.model.localeCompare(b.model) : b.model.localeCompare(a.model);
                } else if (by === "price") {
                    return ascending ? parseInt(a.price.replace(/\D/g, "")) - parseInt(b.price.replace(/\D/g, "")) : parseInt(b.price.replace(/\D/g, "")) - parseInt(a.price.replace(/\D/g, ""));
                }
            });
            displayCars(sortedCars);
        }
        
        window.onload = function () {
            const urlParams = new URLSearchParams(window.location.search);
            const selectedCar = urlParams.get("car");

            if (selectedCar) {
                document.getElementById("searchCar").value = selectedCar; // Fill search bar
                filterCars(); // Automatically filter
            } else {
                displayCars(allCars); // Show all cars if no search query
            }
            populateFilters();
        };


        // Search Suggestion
        function showSuggestions() {
            let input = document.getElementById("searchCar").value.toLowerCase();
            let suggestionsBox = document.getElementById("searchSuggestions");

            // If input is empty, hide suggestions
            if (!input) {
                suggestionsBox.style.display = "none";
                return;
            }

            // Filter cars that match input
            let filteredCars = allCars.filter(car => 
                // (car.make + " " + car.model).toLowerCase().includes(input)
                (`${car.make} ${car.model}`).toLowerCase().includes(input)
            );

            // Generate dropdown content
            let suggestionsHTML = filteredCars.map(car => 
                `<div onclick="selectSuggestion('${car.make} ${car.model}')">${car.make} ${car.model}</div>`
            ).join("");

            // Display suggestions or hide if none
            if (filteredCars.length > 0) {
                suggestionsBox.innerHTML = suggestionsHTML;
                suggestionsBox.style.display = "block";
            } else {
                suggestionsBox.innerHTML = `<div class="no-suggestions">No cars found</div>`;
                suggestionsBox.style.display = "block";
            }
        }

        // Function to autofill search bar when a suggestion is clicked
        function selectSuggestion(value) {
            document.getElementById("searchCar").value = value;
            document.getElementById("searchSuggestions").style.display = "none";
            filterCars(); // Run the filter function to show results
        }

    </script>
</head>


<body class="bg-light">

<!-- Right Sticky Sidebar -->
<div class="sidebark">
    <a href="essai-en.php"><i class="fas fa-car"></i> <span>Test Drive</span></a>
    <a href="contact-en.php"><i class="fas fa-envelope"></i> <span>Contact Us</span></a>
</div>
<!-- End Sidekick -->

<main class="bg-light pt-4">
    <h2 class="text-center mb-4 txt-color fw-bold">SuperCar Collection</h2>
    <div class="container mt-5 x2">
        <div class="row">
            <div class="col-md-2 sidefilter">
                <h4 class="text-center txt-color mb-3 mt-2">Filters</h4>
                <div class="mb-3">
                    <select id="filterMake" class="form-select x3" onchange="filterCars()">
                        <option value="">All Manufacturers</option>
                    </select>
                </div>
                <div class="mb-3">
                    <select id="filterType" class="form-select x3" onchange="filterCars()">
                        <option value="">All Body Types</option>
                    </select>
                </div>
                <!-- <div class="col-12 d-flex gap-2 mb-3"> -->
                    <button class="btn btn-crimson w-100 mb-2 mt-2" onclick="clearFilters()">Clear Filters</button>
                <!-- </div> -->
                <div class="dropdown mt-3">
                    <button class="btn btn-outline-crimson dropdown-toggle w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort By
                    </button>
                    <ul class="dropdown-menu dmenu">
                        <li><a class="dropdown-item" href="#" onclick="sortCars('name', false)">Name (A-Z)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortCars('name', true)">Name (Z-A)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortCars('price', true)">Price (Low to High)</a></li>
                        <li><a class="dropdown-item" href="#" onclick="sortCars('price', false)">Price (High to Low)</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row x7" id="carContainer">
                <!-- Car cards will be inserted here -->
            </div>
        </div>
    </div>
</main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const urlParams = new URLSearchParams(window.location.search);
            const carName = urlParams.get("car");
    
            if (carName) {
                document.getElementById("carTitle").textContent = carName;
            }
        });
    </script>
    
<br />

<!-- Footer -->
<footer>
    <p>&copy; 2025 Supercar. All rights reserved.</p>
    <a href="https://www.facebook.com/" target="_blank" class="fab fa-facebook" style=" margin: 0 10px;"></a>
    <a href="https://x.com/i/flow/login" target="_blank" class="fab fa-twitter" style="margin: 0 10px;"></a>
    <a href="https://www.instagram.com/accounts/login/" target="_blank" class="fab fa-instagram" style="margin: 0 10px;"></a>
    <a href="mailto:contact@supercarweb.com" class="fa-solid fa-envelope" style=" margin: 0 10px;"></a>
    <a href="#top" id="scrollToTop" class="fa-solid fa-arrow-up"></a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById("scrollToTop").addEventListener("click", function (e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>

</body>
</html>

<?php
$conn->close();
?>