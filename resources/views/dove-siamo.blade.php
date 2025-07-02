<x-main-layout>
    <x-slot name="title">Dove siamo</x-slot>

    <div class="container fade-in-section">
        <h1 class="text-center py-5 ParDove">Dove siamo</h1>

        <div class="row align-items-center mb-5">
            {{-- Testo a sinistra --}}
            <div class="col-md-6 mb-4 mb-md-0">
                <p style="font-size: 1.75rem; font-weight: 700;">
                    Potete trovarci in: Via delle Stelle 42, Roma
                </p>
                <p style="font-size: 1.3rem;">Numero di Telefono
                    <a href="tel:+390612345678" style="color: #007bff; text-decoration: underline; font-weight: 600;">
                        +39 06 1234 5678
                    </a>
                </p>
                <p style="font-size: 1.3rem;">
                    o sulla nostra mail <a href="mailto:horizonmedia@mail.com" style="color: #007bff; text-decoration: underline;">horizonmedia@mail.com</a>.
                </p>
            </div>

            {{-- Mappa a destra --}}
            <div class="col-md-6">
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>

    <div class="ContApp container my-5 fade-in-section">
        <div class="text-center p-4 shadow rounded" style="background-color: #f9f9f9;">
            <h4 class="mb-4 mt-5" style="font-size: 2rem;">Inoltre, come ultima novità, scarica l’APP</h4>
            <p class="ParHori" style="font-size: 1.5rem;"><strong>"HorizonMedia"</strong></p>
            <p style="font-size: 1.5rem;">Per rimanere aggiornato con le nostre notizie</p>
            <div style="display: flex; align-items: center; justify-content: center; gap: 40px; margin-top: 20px;">
                <a href="https://play.google.com/store/apps/details?id=com.horizonmedia.app" target="_blank" rel="noopener noreferrer" style="display: inline-block; width: 140px;">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Play Store" style="width: 100%;">
                </a>
                <img src="https://cdn-icons-png.flaticon.com/512/7344/7344131.png" alt="Icona telefono" style="width: 200px;">
                <a href="https://apps.apple.com/it/app/horizonmedia/id000000000" target="_blank" rel="noopener noreferrer" style="display: inline-block; width: 140px;">
                    <img src="https://developer.apple.com/assets/elements/badges/download-on-the-app-store.svg" alt="Apple Store" style="width: 100%;">
                </a>
            </div>
        </div>
    </div>

    {{-- GIF --}}
    <div class="text-center mb-5 fade-in-section" style="margin-top: 40px;">
        <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExYnNzOWg5NmMzNXJnaXg4eWU2d3JjaXUxeDN1YXA2ZTJ2N3N4ODFzOSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/sRHX9qwNKQaQB48RAM/giphy.gif"
            alt="Omino che indica il mondo con giornale"
            style="max-width: 450px;">
    </div>

    {{-- Leaflet CSS & JS --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- Altri script --}}
    <script src="{{ asset('js/script.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Mappa Leaflet
            var map = L.map('map').setView([41.9028, 12.4964], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);
            L.marker([41.9028, 12.4964]).addTo(map).bindPopup(`
                <div style="text-align:center;">
                    <strong>Siamo qui!</strong><br>
                    <a href="https://www.google.com/maps?q=41.9028,12.4964" target="_blank" style="color: #007bff; text-decoration: underline;">
                        Apri su Google Maps
                    </a>
                </div>
            `);

            // Chatbot: invio messaggio e risposta da API
          

            // Fade-in
            const faders = document.querySelectorAll('.fade-in-section');
            const appearOptions = { threshold: 0.1, rootMargin: "0px 0px -50px 0px" };
            const appearOnScroll = new IntersectionObserver(function(entries, observer) {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            }, appearOptions);
            faders.forEach(fader => appearOnScroll.observe(fader));
        });
    </script>
</x-main-layout>
