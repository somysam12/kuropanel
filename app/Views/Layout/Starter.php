<!doctype html>
<html lang="en">

// JOIN MORE UPDATES @ONLINE_KURO_PANEL //

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?= BASE_NAME ?> - <?= isset($title) ? $title : 'Panel' ?></title>
    <?= $this->renderSection('css') ?>

    <?= link_tag('assets/css/natacode.css') ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #2d1b4e;
        overflow-x: hidden;
        position: relative;
        min-height: 100vh;
    }
    
    /* Animated Background */
    body::before {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: url('https://img.freepik.com/free-photo/purple-mountain-landscape_1048-10720.jpg?t=st=1746344176~exp=1746347776~hmac=4dee4abc73d651f049626a103bf6e98bf439b3749cc9b2750101dec08748a7f9&w=826');
        background-size: cover;
        background-position: center;
        z-index: -2;
        animation: backgroundPulse 20s infinite alternate;
    }
    
    /* Animated Overlay */
    body::after {
        content: "";
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle, rgba(93, 63, 159, 0.3) 0%, rgba(45, 27, 78, 0.7) 100%);
        z-index: -1;
        animation: gradientShift 15s infinite alternate;
    }
    
    /* Floating Particles */
    .particles {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: -1;
        overflow: hidden;
    }
    
    .particle {
        position: absolute;
        width: 5px;
        height: 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        animation: float 15s infinite linear;
        will-change: transform, opacity;
    }
    
    @keyframes backgroundPulse {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.05);
        }
    }
    
    @keyframes gradientShift {
        0% {
            opacity: 0.7;
        }
        50% {
            opacity: 0.5;
        }
        100% {
            opacity: 0.7;
        }
    }
    
    @keyframes float {
        0% {
            transform: translateY(0) translateX(0);
            opacity: 0;
        }
        10% {
            opacity: 1;
        }
        90% {
            opacity: 1;
        }
        100% {
            transform: translateY(-100vh) translateX(100px);
            opacity: 0;
        }
    }
    
    
    
    .hacks {
        position: relative;
        display: inline-block;
        width: 80%;
        height: 20px;
        margin: 5%;
        float: left;
        clear: both;
    }
    
    .switch {
        position: relative;
        display: inline-block;
        width: 40px;
        height: 20px;
        float: right;
        margin: 5px;
    }
    
    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }
    
    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(204, 204, 204, 0.3);
        transition: .4s;
    }
    
    .slider:before {
        position: absolute;
        content: "";
        height: 12px;
        width: 12px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }
    
    input:checked + .slider {
        background-color: #a78bfa;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #a78bfa;
    }
    
    input:checked + .slider:before {
        transform: translateX(20px);
    }
    
    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }
    
    .slider.round:before {
        border-radius: 50%;
    }
    
    footer {
        background-color: rgba(93, 63, 159, 0.7);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        position: relative;
        width: 100%;
    }

    main {
        padding-bottom: 60px; /* Footer height */
    }
</style>

<body>
    <!-- Particles container -->
    <div class="particles" id="particles"></div>

    <!-- Start menu -->
    <?= $this->include('Layout/Header') ?>
    <!-- End of menu -->
    
    <main>
        <div class="container py-4 mb-2">
            <!-- Start content -->
            <?= $this->renderSection('content') ?>
            <!-- End of content -->
        </div>
    </main>
    
    <footer class="py-3 text-white">
        <div class="container">
            <small class="text-warning">&copy; <?= date('Y') ?> - <?= BASE_NAME ?></small>
        </div>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.0/sweetalert2.all.min.js" integrity="sha512-0UUEaq/z58JSHpPgPv8bvdhHFRswZzxJUT9y+Kld5janc9EWgGEVGfWV1hXvIvAJ8MmsR5d4XV9lsuA90xXqUQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= script_tag('assets/js/natacode.js') ?>

    <?= $this->renderSection('js') ?>

    <script>
        // Create floating particles
        document.addEventListener('DOMContentLoaded', function() {
            const particlesContainer = document.getElementById('particles');
            const particleCount = 30; // Reduced for better performance
            
            // Clear any existing particles
            particlesContainer.innerHTML = '';
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.classList.add('particle');
                
                // Random position
                const posX = Math.random() * 100;
                const posY = Math.random() * 100;
                
                // Random size between 1-5px
                const size = Math.random() * 4 + 1;
                
                // Random animation duration between 10-30s
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 10;
                
                particle.style.left = `${posX}%`;
                particle.style.top = `${posY}%`;
                particle.style.width = `${size}px`;
                particle.style.height = `${size}px`;
                particle.style.animationDuration = `${duration}s`;
                particle.style.animationDelay = `${delay}s`;
                
                particlesContainer.appendChild(particle);
            }
        });
    </script>
</body>

</html>