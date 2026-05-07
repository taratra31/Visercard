<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MbokaPay API - Documentation</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">
    
    <!-- Swagger UI CSS -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui.css" />
    
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>💳</text></svg>">
    
    <style>
        :root {
            --primary: #0066FF;
            --primary-hover: #0052CC;
            --primary-light: #E8F0FE;
            --dark: #1a1a2e;
            --white: #ffffff;
            --gray-50: #F8FAFC;
            --gray-100: #F1F5F9;
            --gray-200: #E2E8F0;
            --gray-300: #CBD5E1;
            --gray-400: #94A3B8;
            --gray-500: #64748B;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1E293B;
            --gray-900: #0F172A;
            --success: #10B981;
            --warning: #F59E0B;
            --danger: #EF4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: var(--gray-50);
            min-height: 100vh;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--dark);
            line-height: 1.6;
            font-size: 14px;
        }

        /* Navbar */
        .navbar-custom {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: var(--dark) !important;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .navbar-brand i {
            font-size: 1.75rem;
            color: var(--primary);
        }

        .nav-link {
            color: var(--gray-600) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background: var(--primary-light);
        }

        .btn-auth {
            background: var(--primary) !important;
            color: white !important;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .btn-auth:hover {
            background: var(--primary-hover) !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.3);
        }

        .badge-version {
            background: var(--primary-light) !important;
            color: var(--primary) !important;
            padding: 0.35rem 0.75rem;
            font-weight: 600;
            border-radius: 20px;
            font-size: 0.75rem;
        }

        /* Info Section */
        .info-section {
            background: var(--white);
            border-bottom: 1px solid var(--gray-200);
            padding: 1.5rem 0;
        }

        .info-card {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 1rem;
            transition: all 0.2s ease;
        }

        .info-card:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.1);
        }

        .info-icon {
            width: 44px;
            height: 44px;
            background: var(--primary-light);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.125rem;
            flex-shrink: 0;
        }

        .info-text h6 {
            color: var(--dark);
            font-weight: 600;
            margin: 0 0 0.25rem 0;
            font-size: 0.875rem;
        }

        .info-text p {
            color: var(--gray-500);
            font-size: 0.75rem;
            margin: 0;
        }

        .info-text code {
            background: var(--white);
            color: var(--primary);
            padding: 0.2rem 0.5rem;
            border-radius: 4px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.75rem;
            border: 1px solid var(--gray-200);
        }

        /* Swagger Container */
        .swagger-container {
            padding: 2rem 0;
        }

        /* Swagger UI Customization */
        .swagger-ui .topbar {
            display: none;
        }

        .swagger-ui {
            background: transparent;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .swagger-ui .info {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .swagger-ui .info .title {
            color: var(--dark);
            font-size: 1.75rem;
            font-weight: 700;
        }

        .swagger-ui .info .description {
            color: var(--gray-500);
        }

        .swagger-ui .scheme-container {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        /* Operations (endpoints) */
        .swagger-ui .opblock {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 10px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
        }

        .swagger-ui .opblock .opblock-summary {
            border: none;
            padding: 0.75rem 1rem;
        }

        .swagger-ui .opblock .opblock-summary:hover {
            background: var(--gray-50);
        }

        .swagger-ui .opblock .opblock-summary-description {
            color: var(--gray-600);
            font-size: 0.875rem;
        }

        /* Method labels */
        .swagger-ui .opblock-tag {
            color: var(--dark);
            font-size: 1.25rem;
            font-weight: 700;
            border-bottom: 2px solid var(--primary);
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        .swagger-ui .opblock .opblock-summary-method {
            padding: 0.25rem 0.75rem;
            border-radius: 6px;
            font-weight: 700;
            font-size: 0.75rem;
            font-family: 'JetBrains Mono', monospace;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* GET - Blue */
        .swagger-ui .opblock.opblock-get .opblock-summary-method {
            background: var(--primary-light) !important;
            color: var(--primary) !important;
            border: 1px solid var(--primary) !important;
        }

        /* POST - Green */
        .swagger-ui .opblock.opblock-post .opblock-summary-method {
            background: #E6F9F0 !important;
            color: #059669 !important;
            border: 1px solid #10B981 !important;
        }

        /* PUT/PATCH - Orange */
        .swagger-ui .opblock.opblock-put .opblock-summary-method,
        .swagger-ui .opblock.opblock-patch .opblock-summary-method {
            background: #FEF3C7 !important;
            color: #D97706 !important;
            border: 1px solid #F59E0B !important;
        }

        /* DELETE - Red */
        .swagger-ui .opblock.opblock-delete .opblock-summary-method {
            background: #FEE2E2 !important;
            color: #DC2626 !important;
            border: 1px solid #EF4444 !important;
        }

        /* Parameters table */
        .swagger-ui .parameters-container {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 1rem;
        }

        .swagger-ui .parameter__name {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 600;
            color: var(--dark);
        }

        .swagger-ui .parameter__type {
            color: var(--gray-500);
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.8rem;
        }

        /* ===== RESPONSE AREA - NAFENO MANDRA-PIEXECUTE ===== */
        .swagger-ui .responses-wrapper {
            display: none; /* Initially hidden */
        }

        /* Rehefa misy execute dia miseho */
        .swagger-ui .responses-wrapper.has-response {
            display: block;
            margin-top: 1.5rem;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Response status badges */
        .swagger-ui .response-col_status {
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            text-align: center;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        /* 2xx Success */
        .swagger-ui .response-col_status:has(.response-200),
        .swagger-ui .response-col_status:has(.response-201) {
            background: #E6F9F0 !important;
            color: #059669 !important;
            border: 1px solid #10B981;
        }

        /* 4xx Client Error */
        .swagger-ui .response-col_status:has(.response-400),
        .swagger-ui .response-col_status:has(.response-401),
        .swagger-ui .response-col_status:has(.response-403),
        .swagger-ui .response-col_status:has(.response-404),
        .swagger-ui .response-col_status:has(.response-422) {
            background: #FEF3C7 !important;
            color: #D97706 !important;
            border: 1px solid #F59E0B;
        }

        /* 5xx Server Error */
        .swagger-ui .response-col_status:has(.response-500),
        .swagger-ui .response-col_status:has(.response-502),
        .swagger-ui .response-col_status:has(.response-503) {
            background: #FEE2E2 !important;
            color: #DC2626 !important;
            border: 1px solid #EF4444;
        }

        /* ===== LIVE RESPONSE - MIANGONA REHEFA EXECUTE ===== */
        .swagger-ui .live-responses-table {
            display: none; /* Initially hidden */
            margin-top: 1rem;
            border: 1px solid var(--gray-200);
            border-radius: 12px;
            overflow: hidden;
            background: var(--white);
        }

        .swagger-ui .live-responses-table.has-response {
            display: block;
            animation: fadeIn 0.3s ease;
            border: 2px solid var(--primary);
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.1);
        }

        /* Response body */
        .swagger-ui .highlight-code {
            background: var(--gray-50);
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 1rem;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
            color: var(--dark);
        }

        /* Execute button */
        .swagger-ui .btn.execute {
            background: var(--primary) !important;
            color: white !important;
            border: none !important;
            padding: 0.65rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.2s ease;
        }

        .swagger-ui .btn.execute:hover {
            background: var(--primary-hover) !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 102, 255, 0.3);
        }

        /* Try it out button */
        .swagger-ui .btn.try-out__btn {
            background: var(--white);
            color: var(--primary);
            border: 1px solid var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .swagger-ui .btn.try-out__btn:hover {
            background: var(--primary);
            color: white;
        }

        /* Cancel button */
        .swagger-ui .btn.cancel {
            background: var(--gray-100);
            color: var(--gray-600);
            border: 1px solid var(--gray-200);
        }

        /* Authorize button */
        .swagger-ui .btn.authorize {
            background: var(--primary) !important;
            color: white !important;
            border: none !important;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
        }

        /* Modal */
        .swagger-ui .dialog-ux .modal-ux {
            background: var(--white);
            border-radius: 12px;
            border: 1px solid var(--gray-200);
        }

        .swagger-ui .dialog-ux .modal-ux-header {
            border-bottom: 1px solid var(--gray-200);
        }

        .swagger-ui .dialog-ux .modal-ux-header h3 {
            color: var(--dark);
        }

        /* Input fields */
        .swagger-ui input[type="text"] {
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            transition: border-color 0.2s;
        }

        .swagger-ui input[type="text"]:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
            outline: none;
        }

        .swagger-ui textarea {
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            font-family: 'JetBrains Mono', monospace;
            font-size: 0.85rem;
        }

        .swagger-ui textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 102, 255, 0.1);
            outline: none;
        }

        /* Select */
        .swagger-ui select {
            border: 1px solid var(--gray-200);
            border-radius: 6px;
            padding: 0.5rem;
            background: var(--white);
        }

        /* Loading spinner */
        .swagger-ui .loading-container {
            border: 2px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            width: 24px;
            height: 24px;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-300);
            border-radius: 3px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--gray-400);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="fas fa-credit-card"></i>
                MbokaPay API
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <span class="badge badge-version me-3">
                            <i class="fas fa-circle me-1" style="font-size: 0.4rem;"></i>
                            API v1.0
                        </span>
                    </li>
                    <li class="nav-item me-2">
                        <a class="nav-link" href="<?php echo e(url('/user/developer')); ?>">
                            <i class="fas fa-code me-1"></i>
                            Developer
                        </a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-auth" onclick="document.querySelector('.btn.authorize').click()">
                            <i class="fas fa-key me-1"></i>
                            Authentication
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Info Section -->
    <section class="info-section">
        <div class="container">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <div class="info-text">
                            <h6>Authentication</h6>
                            <p>Header: <code>X-API-Key</code></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-globe"></i>
                        </div>
                        <div class="info-text">
                            <h6>Base URL</h6>
                            <p><code>/api/v1</code></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-code-branch"></i>
                        </div>
                        <div class="info-text">
                            <h6>Environments</h6>
                            <p>Sandbox & Production</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <div class="info-text">
                            <h6>Support</h6>
                            <p>developer@mbokapay.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Swagger UI Container -->
    <div class="swagger-container">
        <div class="container">
            <div id="swagger-ui">
                <div class="d-flex justify-content-center align-items-center" style="min-height: 400px;">
                    <div class="spinner-border" style="color: #0066FF; width: 3rem; height: 3rem;" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Swagger UI JS -->
    <script src="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui-bundle.js"></script>
    <script src="https://unpkg.com/swagger-ui-dist@5.11.0/swagger-ui-standalone-preset.js"></script>
    
    <script>
        window.onload = function() {
            const ui = SwaggerUIBundle({
                url: '<?php echo e(url('/api-docs.json')); ?>?v=' + Date.now(),
                dom_id: '#swagger-ui',
                
                presets: [
                    SwaggerUIBundle.presets.apis,
                    SwaggerUIStandalonePreset
                ],
                plugins: [
                    SwaggerUIBundle.plugins.DownloadUrl
                ],
                deepLinking: true,
                supportedSubmitMethods: ['get', 'post', 'put', 'delete', 'patch'],
                layout: "BaseLayout",
                tryItOutEnabled: true,
                displayRequestDuration: true,
                docExpansion: "list",
                operationsSorter: "alpha",
                tagsSorter: "alpha",
                filter: true,
                showExtensions: true,
                defaultModelsExpandDepth: -1, // Hide schemas by default
                
                onComplete: function() {
                    // Remove topbar
                    const topbar = document.querySelector('.swagger-ui .topbar');
                    if (topbar) {
                        topbar.style.display = 'none';
                    }
                    
                    // Pre-fill API key if available
                    const apiKey = localStorage.getItem('swagger_api_key') || 'pk_test_123456';
                    ui.preauthorizeApiKey('api_key', apiKey);
                    
                    // Observer pour tracker quand user clique "Execute"
                    observeExecution();
                    
                    console.log('✅ Swagger UI loaded successfully');
                },
                
                onFailure: function(error) {
                    console.error('Swagger UI failed to load:', error);
                    document.getElementById('swagger-ui').innerHTML = `
                        <div class="alert" style="background: #FEE2E2; color: #DC2626; border: 1px solid #EF4444; border-radius: 12px; padding: 2rem; margin: 2rem;">
                            <h4 style="margin-bottom: 0.5rem;">
                                <i class="fas fa-exclamation-triangle me-2"></i>Loading Error
                            </h4>
                            <p style="margin-bottom: 0.5rem;">Unable to load API documentation.</p>
                            <code>${error.message || 'Unknown error'}</code>
                        </div>
                    `;
                }
            });
            
            window.ui = ui;
        };
        
        function observeExecution() {
            const swaggerContainer = document.getElementById('swagger-ui');
            
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.addedNodes.length > 0) {
                        // Check if response elements appeared
                        const responses = document.querySelectorAll('.swagger-ui .responses-wrapper');
                        const liveResponses = document.querySelectorAll('.swagger-ui .live-responses-table');
                        
                        // Add class 'has-response' pour afficher avec animation
                        responses.forEach(el => {
                            if (el.innerHTML.trim() !== '') {
                                el.classList.add('has-response');
                            }
                        });
                        
                        liveResponses.forEach(el => {
                            if (el.innerHTML.trim() !== '') {
                                el.classList.add('has-response');
                            }
                        });
                    }
                });
            });
            
            observer.observe(swaggerContainer, { childList: true, subtree: true });
        }
    </script>
</body>
</html><?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/swagger.blade.php ENDPATH**/ ?>