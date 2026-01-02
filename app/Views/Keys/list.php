<?= $this->extend('Layout/Starter') ?>

<?= $this->section('content') ?>
<style>
    .card {
        background-color: rgba(93, 63, 159, 0.7) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
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
    
    .table {
        color: white;
        background-color: rgba(255, 255, 255, 0.1);
    }
    
    .table th {
        background-color: rgba(93, 63, 159, 0.5);
        border-color: rgba(255, 255, 255, 0.1);
    }
    
    .table td {
        border-color: rgba(255, 255, 255, 0.05);
        vertical-align: middle;
    }
    
    .dropdown-menu {
        background-color: rgba(93, 63, 159, 0.9);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }
    
    .dropdown-item {
        color: white;
    }
    
    .dropdown-item:hover {
        background-color: rgba(167, 139, 250, 0.3);
    }
    
    .key-sensi {
        filter: blur(5px);
        transition: filter 0.3s ease;
    }
    
    .badge {
        background-color: rgba(255, 255, 255, 0.2);
    }
    
    .btn-outline-danger, .btn-outline-warning, .btn-outline-info {
        border-color: rgba(255, 255, 255, 0.3);
        background-color: rgba(93, 63, 159, 0.3);
        color: white;
    }
    
    .btn-outline-danger:hover, .btn-outline-warning:hover, .btn-outline-info:hover {
        background-color: rgba(93, 63, 159, 0.5);
    }
</style>

<div class="row justify-content-center pt-3">
    <div class="col-lg-12">
        <?= $this->include('Layout/msgStatus') ?>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <i class="bi bi-key me-2"></i> Keys Registered
                        <button class="btn btn-sm btn-outline-light ms-2" id="blur-out" data-bs-toggle="tooltip" title="Toggle Key Visibility">
                            <i class="bi bi-eye-slash"></i>
                        </button>
                    </div>
                    
                    <div class="dropdown">
                        <button class="btn btn-outline-light dropdown-toggle" type="button" id="actionsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-gear me-1"></i> Actions
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a class="dropdown-item" href="<?= site_url('keys/generate') ?>">
                                    <i class="bi bi-plus-circle me-2"></i> Generate Key
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('keys/deleteExp') ?>">
                                    <i class="bi bi-clock-history me-2"></i> Delete Expired Keys
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?= site_url('keys/deleteUnused') ?>">
                                    <i class="bi bi-box me-2"></i> Delete Unused Keys
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="card-body">
                <?php if ($keylist) : ?>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Game</th>
                                    <th>User Key</th>
                                    <th>Devices</th>
                                    <th>Duration</th>
                                    <th>Expired</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                <?php else : ?>
                    <div class="text-center py-4">
                        <i class="bi bi-key text-muted" style="font-size: 3rem;"></i>
                        <p class="text-muted mt-2">No keys found</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('css') ?>
<?= link_tag("https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css") ?>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js") ?>
<?= script_tag("https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js") ?>
<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            order: [[0, "desc"]],
            ajax: "<?= site_url('keys/api') ?>",
            columns: [
                { data: 'id', name: 'id_keys' },
                { data: 'game' },
                { 
                    data: 'user_key',
                    render: function(data, type, row, meta) {
                        var is_valid = (row.status == 'Active') ? "text-success" : "text-danger";
                        return `<span class="${is_valid} keyBlur key-sensi">${(row.user_key ? row.user_key : '&mdash;')}</span>`;
                    }
                },
                { 
                    data: 'devices',
                    render: function(data, type, row, meta) {
                        return `<span id="devMax-${row.user_key}">${row.devices || 0}/${row.max_devices}</span>`;
                    }
                },
                { data: 'duration' },
                { 
                    data: 'expired',
                    render: function(data, type, row, meta) {
                        return row.expired ? `<span class="badge">${row.expired}</span>` : '(not started yet)';
                    }
                },
                { 
                    data: null,
                    render: function(data, type, row, meta) {
                        return `
                            <div class="btn-group btn-group-sm">
                                <button class="btn btn-outline-danger" onclick="resetUserKey('${row.user_key}')" title="Reset Key">
                                    <i class="bi bi-bootstrap-reboot"></i>
                                </button>
                                <button class="btn btn-outline-warning" onclick="resetUserKey1('${row.user_key}')" title="Delete Key">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                                <a href="${window.location.origin}/keys/${row.id}" class="btn btn-outline-info" title="Edit Key">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </div>
                        `;
                    }
                }
            ]
        });

        $("#blur-out").click(function() {
            $(".keyBlur").toggleClass("key-sensi");
            $(this).find("i").toggleClass("bi-eye-slash bi-eye");
        });
    });

    function resetUserKey(keys) {
        showConfirmation(
            'Reset Key', 
            'Are you sure you want to reset this key?', 
            'keys/reset', 
            keys
        );
    }

    function resetUserKey1(keys) {
        showConfirmation(
            'Delete Key', 
            'Are you sure you want to delete this key? This cannot be undone!', 
            'keys/resetAll', 
            keys
        );
    }

    function showConfirmation(title, text, endpoint, keys) {
        Swal.fire({
            title: title,
            text: text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, proceed'
        }).then((result) => {
            if (result.isConfirmed) {
                Toast.fire({
                    icon: 'info',
                    title: 'Processing...'
                });

                $.getJSON(`${window.location.origin}/${endpoint}`, {
                    userkey: keys,
                    reset: 1
                }, function(data) {
                    if (data.registered) {
                        if (data.reset) {
                            $(`#devMax-${keys}`).html(`0/${data.devices_max}`);
                            Swal.fire('Success!', 'Operation completed successfully.', 'success');
                        } else {
                            Swal.fire(
                                data.devices_total ? 'Error!' : 'Warning!',
                                data.devices_total ? "You don't have permission for this action." : "Key was already processed.",
                                data.devices_total ? 'error' : 'warning'
                            );
                        }
                    } else {
                        Swal.fire('Error!', "Key no longer exists.", 'error');
                    }
                });
            }
        });
    }
</script>
<?= $this->endSection() ?>