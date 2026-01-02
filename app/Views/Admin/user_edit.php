<?php
include('mail.php');
?>

// JOIN MORE UPDATES @ONLINE_KURO_PANEL //

<?= $this->extend('Layout/Starter') ?>

<?= $this->section('content') ?>
<style>
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
    
    .card-header {
        background-color: rgba(93, 63, 159, 0.4) !important;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: white !important;
        font-weight: 600;
        padding: 15px 20px;
    }
    
    .form-control, .form-select {
        background-color: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
    }
    
    .form-control:focus, .form-select:focus {
        background-color: rgba(255, 255, 255, 0.15);
        border-color: rgba(167, 139, 250, 0.5);
        color: white;
        box-shadow: 0 0 0 0.25rem rgba(167, 139, 250, 0.25);
    }
    
    .btn-outline-dark {
        color: white;
        border-color: rgba(255, 255, 255, 0.3);
        background-color: rgba(93, 63, 159, 0.3);
    }
    
    .btn-outline-dark:hover {
        background-color: rgba(167, 139, 250, 0.2);
        color: white;
    }
    
    .text-danger {
        color: #ff6b6b !important;
    }
</style>

<div class="row justify-content-center pt-3">
    <div class="col-lg-8">
        <?= $this->include('Layout/msgStatus') ?>
    </div>
    <div class="col-lg-8">
        <div class="card mb-5">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-person-gear me-2"></i> Account Information
                        <span class="text-white-50">• <?= getName($target) ?></span>
                    </div>
                    <a class="btn btn-sm btn-outline-light" href="<?= site_url('admin/manage-users') ?>">
                        <i class="bi bi-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <?= form_open() ?>
                <input type="hidden" name="user_id" value="<?= $target->id_users ?>">
                
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" 
                               value="<?= old('username') ?: $target->username ?>">
                        <?php if ($validation->hasError('username')) : ?>
                            <small class="text-danger"><?= $validation->getError('username') ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="fullname" class="form-label">Fullname</label>
                        <input type="text" name="fullname" id="fullname" class="form-control" 
                               value="<?= old('fullname') ?: $target->fullname ?>">
                        <?php if ($validation->hasError('fullname')) : ?>
                            <small class="text-danger"><?= $validation->getError('fullname') ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="level" class="form-label">Roles</label>
                        <?php $sel_level = ['' => '— Select Roles —', '1' => 'Owner', '2' => 'Admin', '3' => 'Reseller']; ?>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'level', 'id' => 'level'], $sel_level, $target->level) ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <?php $sel_status = ['' => '— Select Status —', '2' => 'Banned/Block', '1' => 'Active', '3' => 'Expired']; ?>
                        <?= form_dropdown(['class' => 'form-select', 'name' => 'status', 'id' => 'status'], $sel_status, $target->status) ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="saldo" class="form-label">Saldo</label>
                        <input type="number" name="saldo" id="saldo" class="form-control" 
                               value="<?= old('saldo') ?: $target->saldo ?>">
                        <?php if ($validation->hasError('saldo')) : ?>
                            <small class="text-danger"><?= $validation->getError('saldo') ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="uplink" class="form-label">Uplink</label>
                        <input type="text" name="uplink" id="uplink" class="form-control" 
                               value="<?= old('uplink') ?: $target->uplink ?>">
                        <?php if ($validation->hasError('uplink')) : ?>
                            <small class="text-danger"><?= $validation->getError('uplink') ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="expiration" class="form-label">Expiration</label>
                        <input type="text" name="expiration" id="expiration" class="form-control" 
                               value="<?= old('expiration') ?: $target->expiration_date ?>">
                        <?php if ($validation->hasError('expiration')) : ?>
                            <small class="text-danger"><?= $validation->getError('expiration') ?></small>
                        <?php endif; ?>
                    </div>
                    
                    <div class="col-12 mt-4">
                        <button type="submit" class="btn btn-outline-dark w-100">
                            <i class="bi bi-save me-2"></i> Update Account Information
                        </button>
                    </div>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>