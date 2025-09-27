// List of available cars
const allCars = [
    { make: "Aston Martin", model: "DB12 Volante" },
    { make: "Aston Martin", model: "DBX" },
    { make: "Aston Martin", model: "Valour" },
    { make: "Aston Martin", model: "Vanquish" },
    { make: "Aston Martin", model: "Vantage" },
    { make: "Maserati", model: "Ghibli" },
    { make: "Maserati", model: "GT2 Stradale" },
    { make: "Maserati", model: "Levante" },
    { make: "Maserati", model: "MC20 Cielo" },
    { make: "Maserati", model: "Quattroporte" },
    { make: "Porsche", model: "Cayenne GTS" },
    { make: "Porsche", model: "911 Turbo S" },
    { make: "Porsche", model: "911 GT3 RS" },
    { make: "Porsche", model: "Taycan" },
    { make: "Porsche", model: "Panamera" }
];

function showSuggestions() {
    const input = document.getElementById("searchCar").value.toLowerCase();
    const suggestionsBox = document.getElementById("searchSuggestions");
    suggestionsBox.innerHTML = "";
    suggestionsBox.style.display = "none"; // Hide if no input

    if (input.length > 0) {
        const filteredCars = allCars.filter(car => 
            (`${car.make} ${car.model}`).toLowerCase().includes(input)
        );

        let suggestionsHTML = "";

        if (filteredCars.length > 0) {
            filteredCars.forEach(car => {
                suggestionsHTML += `<div class="suggestion-item" onclick="redirectToCar('${car.make} ${car.model}')">${car.make} ${car.model}</div>`;
            });
        } else {
            suggestionsHTML = `<div class="no-suggestions">Aucune voiture trouvée</div>`;
        }

        suggestionsBox.innerHTML = suggestionsHTML;
        suggestionsBox.style.display = "block"; // Show suggestions box
    }
}

// Redirect to voiture.php with selected car
function redirectToCar(carName) {
    window.location.href = `voiture-fr.php?car=${encodeURIComponent(carName)}`;
}

// Event listener for real-time search
document.getElementById("searchCar").addEventListener("keyup", showSuggestions);
