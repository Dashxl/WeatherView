// Configuración del mapa
const map = L.map('map').setView([21.5120, -104.8940], 12); // Centro en Guadalajara
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
}).addTo(map);


// Función para obtener clima
async function getWeather(lat, lng) {
    const apiKey = "e0db6fa0ed71226caf356b2df49e1472"; // Reemplaza con tu API Key
    const url = `https://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lng}&appid=${apiKey}&units=metric&lang=es`;

    try {
        const response = await fetch(url);
        const weatherData = await response.json();

        const location = weatherData.name || "Ubicación desconocida";
        const temp = weatherData.main.temp;
        const description = weatherData.weather[0].description;
        const iconCode = weatherData.weather[0].icon;
        const iconUrl = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;

        // Actualizar información del clima
        document.getElementById("location").textContent = `Ubicación: ${location}`;
        document.getElementById("temperature").textContent = `Temperatura: ${temp}°C`;
        document.getElementById("description").textContent = `Condición: ${description}`;
        document.getElementById("weather-icon").src = iconUrl;
        document.getElementById("weather-icon").style.display = "block";
    } catch (error) {
        console.error("Error al obtener el clima:", error);
    }
}

// Manejo del clic en el mapa
map.on("click", (e) => {
    const { lat, lng } = e.latlng;
    getWeather(lat, lng);
});

// Función para buscar ubicación
async function searchLocation(query) {
    const url = `https://nominatim.openstreetmap.org/search?format=json&q=${query}`;
    try {
        const response = await fetch(url);
        const results = await response.json();

        if (results.length > 0) {
            const { lat, lon } = results[0];
            map.setView([lat, lon], 12); // Mover el mapa a la ubicación encontrada
            getWeather(lat, lon); // Obtener el clima en esa ubicación
        } else {
            alert("Ubicación no encontrada.");
        }
    } catch (error) {
        console.error("Error al buscar la ubicación:", error);
    }
}

// Event listener para el botón de búsqueda
document.getElementById("search-button").addEventListener("click", () => {
    const query = document.getElementById("search-input").value;
    if (query) {
        searchLocation(query);
    } else {
        alert("Por favor, ingresa un lugar para buscar.");
    }
});