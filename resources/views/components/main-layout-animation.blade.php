<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>{{env('APP_NAME')}} - {{$title}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <style>
    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: white;
      display: flex;
      justify-content: center;
      align-items: center;
      z-index: 9999;
      opacity: 1;
      transition: opacity 2s ease; /* transizione più lenta */
    }

    #preloader img {
      width: 250px; /* grande */
      height: auto;
    }
  </style>
</head>
<body>

<!-- Preloader -->
<div id="preloader">
  <img src="https://media2.giphy.com/media/v1.Y2lkPTc5MGI3NjExYmJxb2ppYXc3NGJhM2lkeHBzNnV1ZHd3MjBiMnUzYjg0bW9zc3ExYSZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/0ntj03MiCWb73I6a5q/giphy.gif" alt="Caricamento...">
</div>

<x-shared.nav-bar />
{{$slot}}
<x-shared.footer />


<script type="text/javascript">
  window.addEventListener('load', function () {
    const preloader = document.getElementById('preloader');

    // Dopo 2 secondi inizia a svanire
    setTimeout(() => {
      preloader.style.opacity = '0';
    }, 2000);

    // Dopo 3.5 secondi scompare del tutto
    setTimeout(() => {
      preloader.style.display = 'none';
    }, 3500);
  });
</script>

<script>
  // Funzione per animare i numeri
  function animateCounter(counter) {
    const target = +counter.getAttribute('data-target');
    let count = 0;
    const increment = Math.ceil(target / 100); // velocità
    const update = () => {
      count += increment;
      if (count >= target) {
        counter.innerText = target;
      } else {
        counter.innerText = count;
        requestAnimationFrame(update);
      }
    };
    update();
  }

  // Usa IntersectionObserver per far partire il conteggio quando visibile
  document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const section = document.getElementById('counter-section');

    let triggered = false;

    const observer = new IntersectionObserver(entries => {
      if (entries[0].isIntersecting && !triggered) {
        counters.forEach(counter => animateCounter(counter));
        triggered = true;
      }
    }, { threshold: 0.5 });

    observer.observe(section);
  });
</script>


</body>
</html>
