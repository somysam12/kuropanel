<?= $this->extend('Layout/Starter') ?>

<?= $this->section('content') ?>

<style>
    body {
        font-family: 'Poppins', sans-serif !important;
        margin: 0;
        padding: 0;
        background-color: #2d1b4e;
        overflow-x: hidden;
        position: relative;
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
    }
    
    .particle {
        position: absolute;
        width: 5px;
        height: 5px;
        background-color: rgba(255, 255, 255, 0.5);
        border-radius: 50%;
        animation: float 15s infinite linear;
    }
    
    @keyframes backgroundPulse {
        0% {
            transform: scale(1);
        }
        100% {
            transform: scale(1.1);
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
    
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    
    .card {
        background-color: rgba(93, 63, 159, 0.7) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        max-width: 400px;
        width: 100%;
    }
    
    .card-header {
        background-color: transparent;
        border-bottom: none;
        color: white;
        text-align: center;
        font-size: 24px;
        padding-top: 20px;
    }
    
    .card-body {
        padding: 30px;
    }
    
    .form-control {
        background-color: rgba(93, 63, 159, 0.4);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white !important;
        border-radius: 50px;
        padding: 12px 20px;
    }
    
    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }
    
    .form-control:focus {
        background-color: rgba(93, 63, 159, 0.6);
        box-shadow: 0 0 0 0.25rem rgba(255, 255, 255, 0.1);
        border-color: rgba(255, 255, 255, 0.3);
    }
    
    label {
        color: white;
        margin-left: 10px;
        font-size: 14px;
    }
    
    .form-check-label {
        color: white;
    }
    
    .form-check-input {
        background-color: rgba(93, 63, 159, 0.4);
        border-color: rgba(255, 255, 255, 0.3);
    }
    
    .form-check-input:checked {
        background-color: #8e65e3;
    }
    
    .btn-login {
        background-color: white;
        color: #5d3f9f;
        border-radius: 50px;
        padding: 10px;
        font-weight: bold;
        width: 100%;
        border: none;
        transition: all 0.3s;
    }
    
    .btn-login:hover {
        background-color: #f0f0f0;
        transform: translateY(-2px);
    }
    
    .forgot-password {
        color: white;
        text-decoration: none;
        font-size: 14px;
    }
    
    .forgot-password:hover {
        text-decoration: underline;
        color: white;
    }
    
    .register-link {
        color: white;
        text-decoration: none;
    }
    
    .register-link:hover {
        text-decoration: underline;
    }
    
    .after-card {
        color: white !important;
    }
    
    .after-card a {
        color: #a78bfa !important;
    }
    
    .input-icon {
        position: relative;
    }
    
    .input-icon i {
        position: absolute;
        right: 15px;
        top: 42px;
        color: white;
    }
    
    .text-danger {
        color: #ff6b6b !important;
    }
    
    .custom-alert {
        display: flex;
        align-items: center;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 20px;
        background-color: rgba(93, 63, 159, 0.7);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        border: 1px solid rgba(255, 255, 255, 0.1);
        color: white;
        position: relative;
        overflow: hidden;
        animation: fadeIn 0.5s ease-out forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(-10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .alert-icon {
        margin-right: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        background-color: rgba(255, 255, 255, 0.2);
        font-size: 18px;
    }
    
    .alert-content {
        flex: 1;
        font-weight: 500;
    }
    
    .primary-alert {
        border-left: 5px solid #a78bfa;
    }
</style>

<!-- Particles container -->
<div class="particles" id="particles"></div>

<div class="login-container">
    <div class="col-lg-4">
        <?= $this->include('Layout/msgStatus') ?>
        
        <div class="card shadow-sm mb-5">
            <div class="card-header">
                Login
            </div>
            <div class="card-body">
                <?= form_open() ?>
                <div class="form-group mb-4 input-icon">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="help-username" placeholder="Your username" required minlength="4">
                    <i class="bi bi-person-fill"></i>
                    <?php if ($validation->hasError('username')) : ?>
                        <small id="help-username" class="form-text text-danger"><?= $validation->getError('username') ?></small>
                    <?php endif; ?>
                </div>
                <div class="form-group mb-4 input-icon">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" aria-describedby="help-password" placeholder="Your password" required minlength="4">
                    <i class="bi bi-lock-fill"></i>
                    <?php if ($validation->hasError('password')) : ?>
                        <small id="help-password" class="form-text text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="form-group mb-4">
                    <input type="hidden" class="form-control" name="ip" value="<?php echo $_SERVER['HTTP_USER_AGENT']; ?>" id="ip" aria-describedby="help-ip" required>
                    <?php if ($validation->hasError('ip')) : ?>
                        <small id="help-ip" class="form-text text-danger"><?= $validation->getError('ip') ?></small>
                    <?php endif; ?>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="stay_log" id="stay_log" value="yes">
                        <label class="form-check-label" for="stay_log" data-bs-toggle="tooltip" data-bs-placement="top" title="Keep session more than 30 minutes">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>
                
                <div class="form-group mb-3">
                    <button type="submit" class="btn-login">Login</button>
                </div>
                
                <div class="text-center mt-3">
                    <p class="text-white mb-0">
                        Don't have an account? <a href="<?= site_url('register') ?>" class="register-link">Register</a>
                    </p>
                </div>
                <?= form_close() ?>
            </div>
        </div>
        
        <p class="text-center after-card">
            <small class="px-auto p-2 rounded">
                
                <a href="https://telegram.me/AloneBoy_Boss" class="register-link"></a>
            </small>
        </p>
    </div>
</div>

<script>
    // Create floating particles
    document.addEventListener('DOMContentLoaded', function() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 50;
        
        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.classList.add('particle');
            
            // Random position
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            
            // Random size
            const size = Math.random() * 4 + 1;
            
            // Random animation duration
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

<?= $this->endSection() ?>
