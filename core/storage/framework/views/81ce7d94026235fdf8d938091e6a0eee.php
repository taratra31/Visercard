<?php
    $user = auth()->user();
    $pageTitle = 'Developer Dashboard';
?>

<?php $__env->startPush('head'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="card border-0 bg-white mb-4 shadow-sm" style="border-radius: 16px; border-left: 4px solid #0066FF;">
        <div class="card-body p-4">
            <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                <div>
                    <h2 class="fw-bold mb-2" style="color: #1a1a2e;">
                        <i class="fas fa-code me-2" style="color: #0066FF;"></i>Developer Console
                    </h2>
                    <p class="mb-2 text-muted">API-First Platform • Manage API Keys and Virtual Cards</p>
                    <span class="badge" style="background: #E8F0FE; color: #0066FF;">
                        <span class="d-inline-block rounded-circle me-1" style="width: 8px; height: 8px; background: #10B981;"></span>
                        API Status: Online
                    </span>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('user.developer.documentation')); ?>" class="btn" style="background: #F1F5F9; color: #64748B; border: none; padding: 10px 24px; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-book me-2"></i>Documentation
                    </a>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKeyModal" style="background: #0066FF; border: none; padding: 10px 24px; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-plus me-2"></i>Create API Key
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="row g-4 mb-4">
        <?php $__currentLoopData = [
            ['id'=>'totalKeys', 'icon'=>'fa-key', 'label'=>'API Keys', 'trend'=>'+2 this week'],
            ['id'=>'cardsCount', 'icon'=>'fa-credit-card', 'label'=>'Virtual Cards', 'trend'=>'+5 activated'],
            ['id'=>'transactionsCount', 'icon'=>'fa-exchange-alt', 'label'=>'Transactions', 'trend'=>'$12,450 volume'],
            ['id'=>'apiCalls', 'icon'=>'fa-chart-line', 'label'=>'API Calls', 'trend'=>'99.9% uptime']
        ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-6 col-lg-3">
            <div class="card h-100 border-0 shadow-sm bg-white" style="border-radius: 12px;">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="flex-shrink-0 rounded-3 p-3" style="background: #E8F0FE;">
                            <i class="fas <?php echo e($stat['icon']); ?> fa-lg" style="color: #0066FF;"></i>
                        </div>
                    </div>
                    <h3 class="fw-bold mb-1" id="<?php echo e($stat['id']); ?>" style="color: #1a1a2e;">0</h3>
                    <p class="text-muted small text-uppercase fw-semibold mb-2"><?php echo e($stat['label']); ?></p>
                    <span class="small" style="color: #0066FF;"><i class="fas fa-arrow-up me-1"></i><?php echo e($stat['trend']); ?></span>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- API Keys Table -->
    <div class="card border-0 shadow-sm mb-4 bg-white" style="border-radius: 16px;">
        <div class="card-header bg-white border-bottom py-3 px-4" style="border-radius: 16px 16px 0 0;">
            <h5 class="fw-semibold mb-1" style="color: #1a1a2e;">Active API Keys</h5>
            <p class="text-muted small mb-0">Manage your authentication keys for Sandbox and Live environments</p>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead style="background: #F8FAFC;">
                        <tr>
                            <th class="fw-semibold text-uppercase small ps-4" style="font-size: 0.75rem; color: #64748B;">Name</th>
                            <th class="fw-semibold text-uppercase small" style="font-size: 0.75rem; color: #64748B;">Public Key</th>
                            <th class="fw-semibold text-uppercase small" style="font-size: 0.75rem; color: #64748B;">Environment</th>
                            <th class="fw-semibold text-uppercase small" style="font-size: 0.75rem; color: #64748B;">Status</th>
                            <th class="fw-semibold text-uppercase small" style="font-size: 0.75rem; color: #64748B;">Created</th>
                            <th class="fw-semibold text-uppercase small" style="font-size: 0.75rem; color: #64748B;">Last Used</th>
                            <th class="fw-semibold text-uppercase small pe-4 text-end" style="font-size: 0.75rem; color: #64748B;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $apiKeys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apiKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr data-id="<?php echo e($apiKey->id); ?>" style="border-bottom: 1px solid #E2E8F0;">
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="fw-semibold" style="color: #1a1a2e;"><?php echo e($apiKey->name); ?></span>
                                    <span class="badge rounded-pill" style="background: #E8F0FE; color: #0066FF; font-size: 0.625rem;">API</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <code style="background: #F8FAFC; color: #64748B; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;"><?php echo e(substr($apiKey->public_key, 0, 20)); ?>...</code>
                                    <button class="btn btn-sm" onclick="copyToClipboard('<?php echo e($apiKey->public_key); ?>')" title="Copy" style="background: #E8F0FE; color: #0066FF; border: none; width: 28px; height: 28px; padding: 0; border-radius: 6px;">
                                        <i class="fas fa-copy" style="font-size: 0.7rem;"></i>
                                    </button>
                                </div>
                            </td>
                            <td>
                                <?php if($apiKey->environment == 'live'): ?>
                                    <span class="badge rounded-pill" style="background: #E6F9F0; color: #059669;">
                                        <i class="fas fa-globe me-1 small"></i>Live
                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill" style="background: #FEF3C7; color: #D97706;">
                                        <i class="fas fa-flask me-1 small"></i>Sandbox
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="badge rounded-pill" style="background: #E8F0FE; color: #0066FF;">
                                    <i class="fas fa-check-circle me-1 small"></i>Active
                                </span>
                            </td>
                            <td><span class="text-muted small"><?php echo e($apiKey->created_at ? $apiKey->created_at->format('M d, Y H:i') : '-'); ?></span></td>
                            <td><span class="text-muted small"><?php echo e($apiKey->last_used_at ? $apiKey->last_used_at->format('M d, Y H:i') : 'Never'); ?></span></td>
                            <td class="pe-4 text-end">
                                <div class="d-flex gap-1 justify-content-end">
                                    <button class="btn btn-sm" onclick="viewKeyDetails(<?php echo e($apiKey->id); ?>)" title="View" style="background: #E8F0FE; color: #0066FF; border: none; width: 28px; height: 28px; padding: 0; border-radius: 6px;"><i class="fas fa-eye" style="font-size: 0.7rem;"></i></button>
                                    <button class="btn btn-sm" onclick="copyToClipboard('<?php echo e($apiKey->public_key); ?>')" title="Copy" style="background: #E8F0FE; color: #0066FF; border: none; width: 28px; height: 28px; padding: 0; border-radius: 6px;"><i class="fas fa-copy" style="font-size: 0.7rem;"></i></button>
                                    <button class="btn btn-sm" onclick="revokeKey(<?php echo e($apiKey->id); ?>)" title="Delete" style="background: #FEE2E2; color: #EF4444; border: none; width: 28px; height: 28px; padding: 0; border-radius: 6px;"><i class="fas fa-trash-alt" style="font-size: 0.7rem;"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-key fa-3x mb-3" style="color: #CBD5E1;"></i>
                                <h5 class="fw-semibold mb-2" style="color: #1a1a2e;">No API Keys</h5>
                                <p class="text-muted mb-3">Create your first API key to get started</p>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createKeyModal" style="background: #0066FF; border: none; padding: 10px 24px; border-radius: 8px;">
                                    <i class="fas fa-plus me-2"></i>Create API Key
                                </button>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Documentation Section -->
    <div class="mb-4">
        <div class="text-center mb-4">
            <h4 class="fw-semibold mb-1" style="color: #1a1a2e;">Documentation & Resources</h4>
            <p class="text-muted small">Tools and documentation to integrate the API into your applications</p>
        </div>
        <div class="row g-4">
            <?php $__currentLoopData = [
                ['icon'=>'fa-book', 'title'=>'Swagger UI', 'desc'=>'Interactive interface to test and explore all API endpoints with built-in authentication.', 'link'=>url('/swagger-ui'), 'btn'=>'Launch Swagger UI'],
                ['icon'=>'fa-file-code', 'title'=>'OpenAPI v3.0', 'desc'=>'Complete specification in JSON format to integrate with your development tools.', 'link'=>'/core/storage/api-docs/api-docs-v1.json', 'btn'=>'Download Spec'],
                ['icon'=>'fa-laptop-code', 'title'=>'Code Examples', 'desc'=>'Ready-to-use snippets for PHP, JavaScript, Python, and other languages.', 'link'=>'#', 'btn'=>'View Examples', 'onclick'=>'showCodeExamples()']
            ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm text-center bg-white" style="border-radius: 12px;">
                    <div class="card-body p-4">
                        <div class="rounded-3 p-3 mx-auto mb-3" style="background: #E8F0FE; width: 64px; height: 64px; display: flex; align-items: center; justify-content: center;">
                            <i class="fas <?php echo e($doc['icon']); ?> fa-lg" style="color: #0066FF;"></i>
                        </div>
                        <h5 class="fw-semibold mb-2" style="color: #1a1a2e;"><?php echo e($doc['title']); ?></h5>
                        <p class="text-muted small mb-3"><?php echo e($doc['desc']); ?></p>
                        <?php if(isset($doc['onclick'])): ?>
                            <button class="btn btn-primary" onclick="<?php echo e($doc['onclick']); ?>" style="background: #0066FF; border: none; border-radius: 8px;"><i class="fas fa-code me-2"></i><?php echo e($doc['btn']); ?></button>
                        <?php else: ?>
                            <a href="<?php echo e($doc['link']); ?>" target="_blank" class="btn btn-primary" style="background: #0066FF; border: none; border-radius: 8px;"><i class="fas fa-external-link-alt me-2"></i><?php echo e($doc['btn']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<!-- Create Key Modal -->
<div class="modal fade" id="createKeyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header" style="background: #0066FF; color: white; border-radius: 16px 16px 0 0; border: none;">
                <h5 class="modal-title fw-semibold">Create New API Key</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form id="createKeyForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a1a2e;">Key Name *</label>
                        <input type="text" name="name" class="form-control" required placeholder="Ex: API Key for my e-commerce site" style="border: 1px solid #E2E8F0; border-radius: 8px;">
                        <div class="form-text text-muted">Choose a descriptive name to easily identify this key</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold" style="color: #1a1a2e;">Environment *</label>
                        <select name="environment" class="form-select" required style="border: 1px solid #E2E8F0; border-radius: 8px;">
                            <option value="sandbox">Sandbox (Testing)</option>
                            <option value="live">Live (Production)</option>
                        </select>
                        <div class="form-text text-muted mt-2">
                            <strong>Sandbox:</strong> For testing and development<br>
                            <strong>Live:</strong> For production with real transactions
                        </div>
                    </div>

                    <div class="alert d-flex align-items-center" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 0.75rem 1rem;">
                        <i class="fas fa-info-circle me-2" style="color: #0066FF;"></i>
                        <small style="color: #64748B;"><strong style="color: #1a1a2e;">Limit:</strong> Maximum 5 API keys per account</small>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0 px-4 pb-4">
                    <button type="button" class="btn" style="background: #F1F5F9; color: #64748B; border: none; border-radius: 8px; padding: 0.5rem 1.25rem;" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn" style="background: #0066FF; color: white; border: none; border-radius: 8px; padding: 0.5rem 1.25rem; font-weight: 600;">
                        <i class="fas fa-plus me-2"></i>Create Key
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Key Details Modal -->
<div class="modal fade" id="keyDetailsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header">
                <h5 class="modal-title fw-semibold">API Key Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="keyDetailsContent">
                <!-- Content will be loaded dynamically -->
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 16px;">
            <div class="modal-header bg-success bg-opacity-10 border-0">
                <h5 class="modal-title text-success fw-semibold">
                    <i class="fas fa-check-circle me-2"></i>API Key Created Successfully!
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4" id="successModalContent">
                <!-- Content will be loaded dynamically -->
            </div>
            <div class="modal-footer border-0 pt-0 px-4 pb-4">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Got it</button>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
    /* Minimal custom styles - Bootstrap handles the rest */
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .fade-in {
        animation: fadeIn 0.3s ease-out forwards;
    }
    
    /* Table improvements */
    .table th {
        font-size: 0.7rem;
        letter-spacing: 0.5px;
    }
    
    /* Card hover effect */
    .card {
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
    }
    
    /* ===== BUTTON COLOR IMPROVEMENTS ===== */
    
    /* Primary Button - Gradient Purple */
    .btn-primary {
        background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
        border: none;
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.3);
    }
    
    .btn-primary:hover {
        background: linear-gradient(135deg, #4f46e5 0%, #7c3aed 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(99, 102, 241, 0.4);
    }
    
    /* Light Button - Header CTA */
    .btn-light {
        background: #ffffff;
        color: #6366f1;
        border: none;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .btn-light:hover {
        background: #f8fafc;
        color: #4f46e5;
        transform: translateY(-2px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
    }
    
    /* Action Buttons in Table - Override Bootstrap */
    .btn.btn-action-view,
    .btn.btn-action-copy,
    .btn.btn-action-delete {
        border: none !important;
        padding: 0 !important;
        width: 32px;
        height: 32px;
        display: inline-flex !important;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    
    .btn.btn-action-view {
        background: linear-gradient(135deg, #3b82f6, #60a5fa) !important;
        color: white !important;
    }
    
    .btn.btn-action-view:hover {
        background: linear-gradient(135deg, #2563eb, #3b82f6) !important;
        transform: scale(1.1);
        color: white !important;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
    }
    
    .btn.btn-action-copy {
        background: linear-gradient(135deg, #10b981, #34d399) !important;
        color: white !important;
    }
    
    .btn.btn-action-copy:hover {
        background: linear-gradient(135deg, #059669, #10b981) !important;
        transform: scale(1.1);
        color: white !important;
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.4);
    }
    
    .btn.btn-action-delete {
        background: linear-gradient(135deg, #ef4444, #f87171) !important;
        color: white !important;
    }
    
    .btn.btn-action-delete:hover {
        background: linear-gradient(135deg, #dc2626, #ef4444) !important;
        transform: scale(1.1);
        color: white !important;
        box-shadow: 0 4px 12px rgba(239, 68, 68, 0.4);
    }
    
    /* Outline buttons */
    .btn-outline-primary {
        border-color: #6366f1;
        color: #6366f1;
    }
    
    .btn-outline-primary:hover {
        background: linear-gradient(135deg, #6366f1, #8b5cf6);
        border-color: transparent;
    }
    
    /* Secondary button */
    .btn-secondary {
        background: linear-gradient(135deg, #64748b, #94a3b8);
        border: none;
    }
    
    .btn-secondary:hover {
        background: linear-gradient(135deg, #475569, #64748b);
    }
    
    /* Success button */
    .btn-success {
        background: linear-gradient(135deg, #10b981, #34d399);
        border: none;
        box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
    }
    
    .btn-success:hover {
        background: linear-gradient(135deg, #059669, #10b981);
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
    }
    
    /* Modal header button close */
    .btn-close-white {
        filter: brightness(0) invert(1);
        opacity: 0.8;
    }
    
    .btn-close-white:hover {
        opacity: 1;
    }
    
    /* All buttons transition */
    .btn {
        transition: all 0.2s ease;
    }
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- Ajouter jQuery si non chargé -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
// Fonctions globales accessibles depuis les onclick
window.showCreateKeyModal = function() {
    var modalElement = document.getElementById('createKeyModal');
    if (modalElement && typeof bootstrap !== 'undefined') {
        var modal = new bootstrap.Modal(modalElement);
        modal.show();
    } else {
        // Fallback si Bootstrap JS n'est pas chargé
        modalElement.style.display = 'block';
        modalElement.classList.add('show');
        document.body.classList.add('modal-open');
    }
};

window.closeCreateKeyModal = function() {
    var modalElement = document.getElementById('createKeyModal');
    if (modalElement && typeof bootstrap !== 'undefined') {
        var modal = bootstrap.Modal.getInstance(modalElement);
        if (modal) {
            modal.hide();
        }
    } else {
        // Fallback
        modalElement.style.display = 'none';
        modalElement.classList.remove('show');
        document.body.classList.remove('modal-open');
    }
};

window.copyToClipboard = function(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Copied to clipboard!');
    });
};

window.showAlert = function(message, type) {
    alert(message);
};

window.viewKeyDetails = function(keyId) {
    alert('Feature under development');
};

window.revokeKey = function(keyId) {
    if (confirm('Are you sure you want to revoke this API key?')) {
        $.ajax({
            url: `/user/developer/api-keys/${keyId}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    alert('API key revoked successfully');
                    location.reload();
                }
            },
            error: function(xhr) {
                alert('Error during revocation');
            }
        });
    }
};

window.showCodeExamples = function() {
    alert('Code examples available in Swagger documentation');
};

function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        showAlert('Copied to clipboard!', 'success');
    });
}

function showAlert(message, type) {
    // Implémenter l'affichage des alertes selon le système de Visercard
    console.log(message, type);
}

function viewKeyDetails(keyId) {
    // Implementer si nécessaire
    showAlert('Feature under development', 'info');
}

function revokeKey(keyId) {
    if (confirm('Are you sure you want to revoke this API key? This action is irreversible.')) {
        $.ajax({
            url: `/user/developer/api-keys/${keyId}`,
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    showAlert('API key revoked successfully', 'success');
                    $(`tr[data-id="${keyId}"]`).fadeOut(300, function() {
                        $(this).remove();
                        loadStats();
                    });
                }
            },
            error: function(xhr) {
                const error = xhr.responseJSON;
                showAlert(error.message || 'An error occurred', 'danger');
            }
        });
    }
}

function showCodeExamples() {
    showAlert('Code examples available in Swagger documentation', 'info');
}

document.addEventListener('DOMContentLoaded', function() {
    loadStats();
    
    // Event listener pour le formulaire
    var form = document.getElementById('createKeyForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            var formData = new FormData(this);
            var data = {};
            formData.forEach(function(value, key) {
                data[key] = value;
            });
            
            var csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (!csrfToken) {
                alert('Error: CSRF Token missing');
                return;
            }
            
            fetch('<?php echo e(route("user.developer.store")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken.getAttribute('content')
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(function(response) {
                if (response.success) {
                    closeCreateKeyModal();
                    showSuccessModal(response.data);
                    form.reset();
                    setTimeout(function() {
                        location.reload();
                    }, 3000);
                } else {
                    alert(response.message || 'Une erreur est survenue');
                }
            })
            .catch(function(error) {
                alert('Une erreur est survenue');
                console.error('Error:', error);
            });
        });
    }
});

function loadStats() {
    fetch('<?php echo e(route("user.developer.stats")); ?>')
        .then(response => response.json())
        .then(function(response) {
            if (response.success) {
                var totalKeys = document.getElementById('totalKeys');
                var cardsCount = document.getElementById('cardsCount');
                var transactionsCount = document.getElementById('transactionsCount');
                var apiCalls = document.getElementById('apiCalls');
                
                if (totalKeys) totalKeys.textContent = response.data.total_keys;
                if (cardsCount) cardsCount.textContent = response.data.cards_count;
                if (transactionsCount) transactionsCount.textContent = response.data.transactions_count;
                if (apiCalls) apiCalls.textContent = response.data.api_calls_today;
            }
        })
        .catch(function(error) {
            console.error('Error loading stats:', error);
        });
}

function showSuccessModal(keyData) {
    var content = `
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <strong>Important:</strong> Save your secret key now. It will not be displayed again!
        </div>
        
        <div class="mb-3">
            <label class="form-label">Nom:</label>
            <div class="api-key-display">${keyData.name}</div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Public Key:</label>
            <div class="api-key-display">
                ${keyData.public_key}
                <button class="btn btn-sm btn-link float-end" onclick="copyToClipboard('${keyData.public_key}')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Secret Key:</label>
            <div class="api-key-display bg-warning bg-opacity-10">
                ${keyData.secret_key}
                <button class="btn btn-sm btn-link float-end" onclick="copyToClipboard('${keyData.secret_key}')">
                    <i class="fas fa-copy"></i>
                </button>
            </div>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Environnement:</label>
            <div>
                <span class="badge ${keyData.environment === 'live' ? 'bg-success' : 'bg-warning'}">
                    ${keyData.environment}
                </span>
            </div>
        </div>
    `;
    
    var successModalContent = document.getElementById('successModalContent');
    var successModal = document.getElementById('successModal');
    
    if (successModalContent) successModalContent.innerHTML = content;
    if (successModal) {
        successModal.style.display = 'block';
        successModal.classList.add('show');
        document.body.classList.add('modal-open');
    }
}

function showCreateKeyModal() {
    var modal = document.getElementById('createKeyModal');
    if (modal) {
        var bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();
    }
}

function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Copied to clipboard!');
        });
    } else {
        // Fallback pour vieux navigateurs
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Copied to clipboard!');
    }
}

function viewKeyDetails(keyId) {
    alert('Key details ' + keyId + ' - Feature under development');
}

window.revokeKey = function(keyId) {
    if (confirm('Are you sure you want to revoke this API key? This action is irreversible.')) {
        var csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (!csrfToken) {
            alert('Error: CSRF Token missing');
            return;
        }
        
        fetch('/user/developer/api-keys/' + keyId, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('API key revoked successfully');
                location.reload();
            } else {
                alert('Error: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            alert('Error during revocation');
            console.error('Error:', error);
        });
    }
}

function showCodeExamples() {
    alert('Code examples available in Swagger documentation');
}
</script>

</div>

<?php echo $__env->make('Template::layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/user/developer/index.blade.php ENDPATH**/ ?>