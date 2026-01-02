<?php if (session()->getFlashdata('msgDanger')) : ?>
    <div class="custom-alert danger-alert" role="alert">
        <div class="alert-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div class="alert-content">
            <?= session()->getFlashdata('msgDanger') ?>
        </div>
        <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
    </div>
<?php elseif (session()->getFlashdata('msgSuccess')) : ?>
    <div class="custom-alert success-alert" role="alert">
        <div class="alert-icon">
            <i class="bi bi-check-circle-fill"></i>
        </div>
        <div class="alert-content">
            <?= session()->getFlashdata('msgSuccess') ?>
        </div>
        <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
    </div>
<?php elseif (session()->getFlashdata('msgWarning')) : ?>
    <div class="custom-alert warning-alert" role="alert">
        <div class="alert-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>
        </div>
        <div class="alert-content">
            <?= session()->getFlashdata('msgWarning') ?>
        </div>
        <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
    </div>
<?php else : ?>
    <?php if (session()->has('userid')) : ?>
        <?php if (isset($messages)) : ?>
            <div class="custom-alert <?= $messages[1] ?>-alert" role="alert">
                <div class="alert-icon">
                    <?php if ($messages[1] === 'success') : ?>
                        <i class="bi bi-check-circle-fill"></i>
                    <?php elseif ($messages[1] === 'danger') : ?>
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    <?php elseif ($messages[1] === 'warning') : ?>
                        <i class="bi bi-exclamation-triangle-fill"></i>
                    <?php else : ?>
                        <i class="bi bi-info-circle-fill"></i>
                    <?php endif; ?>
                </div>
                <div class="alert-content">
                    <?= $messages[0] ?>
                </div>
                <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
            </div>
        <?php else : ?>
            <div class="custom-alert primary-alert" role="alert">
                <div class="alert-icon">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div class="alert-content">
                    Welcome <?= esc(getName($user)) ?>
                </div>
                <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <div class="custom-alert primary-alert" role="alert">
            <div class="alert-icon">
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="alert-content">
                Welcome Stranger
            </div>
            <button type="button" class="btn-close" onclick="this.parentElement.remove()" aria-label="Close"></button>
        </div>
    <?php endif; ?>
<?php endif; ?>

<style>
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
    
    /* Primary Alert */
    .primary-alert {
        border-left: 5px solid #a78bfa;
    }
    
    .primary-alert .alert-icon {
        color: #a78bfa;
    }
    
    /* Success Alert */
    .success-alert {
        border-left: 5px solid #10b981;
    }
    
    .success-alert .alert-icon {
        color: #10b981;
    }
    
    /* Danger Alert */
    .danger-alert {
        border-left: 5px solid #ef4444;
    }
    
    .danger-alert .alert-icon {
        color: #ef4444;
    }
    
    /* Warning Alert */
    .warning-alert {
        border-left: 5px solid #f59e0b;
    }
    
    .warning-alert .alert-icon {
        color: #f59e0b;
    }
    
    /* Close button */
    .custom-alert .btn-close {
        color: white;
        opacity: 0.7;
        transition: opacity 0.3s;
        filter: invert(1) grayscale(100%) brightness(200%);
        margin-left: 10px;
    }
    
    .custom-alert .btn-close:hover {
        opacity: 1;
    }
</style>

<script>
// Fallback for close buttons if inline onclick doesn't work
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.custom-alert').remove();
        });
    });
});
</script>