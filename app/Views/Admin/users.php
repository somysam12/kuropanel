<?php



function color($value) {
    if($value == 1) {
        return "#0000FF";
    } else {
        return "#FF0000";
    }
}
?>

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
    
    .container {
        position: relative;
        z-index: 1;
    }
    
    .card {
        background-color: rgba(93, 63, 159, 0.7) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        margin-bottom: 25px;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
    }
    
    .card-header {
        background-color: rgba(93, 63, 159, 0.4) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: white !important;
        font-weight: 600;
        padding: 15px 20px;
    }
    
    .card-body {
        padding: 20px;
        color: white;
    }
    
    .alert-dark {
        background-color: rgba(33, 37, 41, 0.7);
        border-color: rgba(33, 37, 41, 0.8);
        color: white;
        backdrop-filter: blur(10px);
        border-radius: 10px;
    }
    
    .table {
        color: white !important;
    }
    
    .table-bordered {
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    
    .table-hover tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.1) !important;
    }
    
    .table thead th {
        background-color: rgba(93, 63, 159, 0.4);
        border-color: rgba(255, 255, 255, 0.1) !important;
    }
    
    .btn-dark {
        background-color: rgba(33, 37, 41, 0.7);
        border-color: rgba(33, 37, 41, 0.8);
    }
    
    .btn-dark:hover {
        background-color: rgba(33, 37, 41, 0.9);
        border-color: rgba(33, 37, 41, 1);
    }
    
    .animate-in {
        animation: fadeIn 0.5s ease-out forwards;
        opacity: 0;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>

<!-- Particles container -->
<div class="particles" id="particles"></div>

<div class="row">
    <div class="col-lg-12 animate-in" style="animation-delay: 0.1s">
        <div class="alert alert-dark" role="alert">
            <strong>INFO :</strong> Search specify user by their (username, fullname, saldo or uplink).
        </div>
        <div class="card shadow-sm">
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <i class="bi bi-people-fill me-2"></i>
                    <h2 class="mb-0">𝐌𝐚𝐧𝐚𝐠𝐞 𝐔𝐬𝐞𝐫𝐬</h2>
                </div>
            </div>
            <div class="card-body">
                <?php if ($user_list) : ?>
                <div class="table-responsive">
                    <table id="usersTable" class="table table-bordered table-hover text-center" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="row">ID</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th>Level</th>
                                <th>Saldo</th>
                                <th>Status</th>
                                <th>Uplink</th>
                                <th>Expiration</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($user_list as $u) : ?>
                            <tr>
                                <td><?= $u->id_users ?></td>
                                <td><?= $u->username ?></td>
                                <td><?= $u->fullname ?></td>
                                <td style="color: <?= color($u->level) ?>;">
                                <?php if($u->level == 1) : ?>
                                    <span class="badge bg-primary">Owner</span>
                                <?php elseif($u->level == 2) : ?>
                                    <span class="badge bg-info">Admin</span>
                                <?php else : ?>
                                    <span class="badge bg-secondary">Reseller</span>
                                <?php endif; ?>
                                </td>
                                <td style="color: <?= color($u->level) ?>;">
                                <?php if($u->level == 1) : ?>
                                    <span class="text-primary">&infin;</span>
                                <?php else : ?>
                                    <?= $u->saldo ?>
                                <?php endif; ?>
                                </td>
                                <td>
                                <?php if($u->status == 1) : ?>
                                    <span class="badge bg-success">Active</span>
                                <?php elseif($u->status == 2) : ?>
                                    <span class="badge bg-danger">Banned/Blocked</span>
                                <?php else : ?>
                                    <span class="badge bg-warning">Expired</span>
                                <?php endif; ?>
                                </td>
                                <td><?= $u->uplink ?></td>
                                <td><?= $u->expiration_date ?></td>
                                <td>
                                    <a href="user/<?php echo $u->id_users ?>" class="btn btn-dark btn-sm"><i class="bi bi-pencil-square"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
    // Create floating particles
    document.addEventListener('DOMContentLoaded', function() {
        const particlesContainer = document.getElementById('particles');
        const particleCount = 50;
        
        if (particlesContainer) {
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
        }

        // Initialize DataTable if table exists
        if (typeof $ !== 'undefined' && $('#usersTable').length) {
            $('#usersTable').DataTable({
                "order": [[0, "desc"]]
            });
        }
        
        // Animation
        const animatedElements = document.querySelectorAll('.animate-in');
        animatedElements.forEach(element => {
            element.style.animationPlayState = 'running';
        });
    });
</script>

<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag("https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css") ?>
<?= link_tag("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css") ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js") ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js") ?>
<?= script_tag("https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js") ?>
<?= $this->endSection() ?>