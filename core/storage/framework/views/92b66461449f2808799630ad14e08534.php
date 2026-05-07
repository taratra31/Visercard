<?php
    $pageTitle = 'API Documentation';
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
                        <i class="fas fa-book me-2" style="color: #0066FF;"></i>API Documentation
                    </h2>
                    <p class="mb-2 text-muted">Integrate MbokaPay API into your applications</p>
                    <span class="badge" style="background: #E8F0FE; color: #0066FF;">
                        <span class="d-inline-block rounded-circle me-1" style="width: 8px; height: 8px; background: #10B981;"></span>
                        API Status: Online
                    </span>
                </div>
                <div class="d-flex gap-2">
                    <a href="<?php echo e(route('user.developer.index')); ?>" class="btn" style="background: #0066FF; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600;">
                        <i class="fas fa-arrow-left me-2"></i>Back to API Keys
                    </a>
                    <?php if($apiKey): ?>
                    <button class="btn" style="background: #0066FF; color: white; border: none; padding: 10px 20px; border-radius: 8px; font-weight: 600;" onclick="copyToClipboard('<?php echo e($apiKey->public_key); ?>')">
                        <i class="fas fa-copy me-2"></i>Copy API Key
                    </button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- API Base URL -->
    <div class="card border-0 bg-white mb-4 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-3" style="color: #1a1a2e;">Base URL</h5>
            <div class="d-flex align-items-center gap-3 p-3" style="background: #F8FAFC; border-radius: 8px; border: 1px solid #E2E8F0;">
                <code style="font-size: 1rem; color: #0066FF; font-weight: 600;">https://mbokapay.com/api/v1/</code>
                <button class="btn btn-sm ms-auto" onclick="copyToClipboard('https://mbokapay.com/api/v1/')" style="background: #E8F0FE; color: #0066FF; border: none;">
                    <i class="fas fa-copy"></i> Copy
                </button>
            </div>
        </div>
    </div>

    <!-- Authentication -->
    <div class="card border-0 bg-white mb-4 shadow-sm" style="border-radius: 12px;">
        <div class="card-body p-4">
            <h5 class="fw-semibold mb-3" style="color: #1a1a2e;">
                <i class="fas fa-shield-alt me-2" style="color: #0066FF;"></i>Authentication
            </h5>
            <p class="text-muted mb-3">All API requests must include your API key in the header:</p>
            <div class="p-3" style="background: #0F172A; border-radius: 8px;">
                <code style="color: #22C55E; font-size: 0.9rem;">X-API-Key: your_api_key_here</code>
            </div>
            <?php if(!$apiKey): ?>
            <div class="alert mt-3" style="background: #FEF3C7; border: 1px solid #F59E0B; color: #D97706; border-radius: 8px;">
                <i class="fas fa-exclamation-triangle me-2"></i>
                You need to <a href="<?php echo e(route('user.developer.index')); ?>" style="color: #D97706; font-weight: 600;">create an API key</a> first.
            </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Endpoints -->
    <div class="card border-0 bg-white mb-4 shadow-sm" style="border-radius: 12px;">
        <div class="card-header bg-white border-bottom py-3 px-4" style="border-radius: 12px 12px 0 0;">
            <h5 class="fw-semibold mb-0" style="color: #1a1a2e;">
                <i class="fas fa-plug me-2" style="color: #0066FF;"></i>Available Endpoints
            </h5>
        </div>
        <div class="card-body p-0">
            <!-- Endpoint 1: Create Cardholder -->
            <div class="p-4 border-bottom" style="border-color: #E2E8F0 !important;">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge" style="background: #E6F9F0; color: #059669; font-size: 0.75rem; padding: 0.5rem 1rem; font-weight: 600;">POST</span>
                    <code style="color: #1a1a2e; font-size: 1rem; font-weight: 600;">/cardholders</code>
                    <span class="text-muted ms-auto">Create Cardholder</span>
                </div>
                <p class="text-muted mb-3">Create a new cardholder with full KYC information.</p>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Request Body</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "firstname": "John",
  "lastname": "Doe",
  "nickname": "Johnny",
  "email": "john@example.com",
  "date_of_birth": "1990-01-15",
  "mobile": "+1234567890",
  "address": "123 Main Street",
  "city": "New York",
  "state": "NY",
  "postal_code": "10001",
  "id_type": "BVN",
  "id_number": "12345678901",
  "id_front_image": "base64_encoded_image_string",
  "id_back_image": "base64_encoded_image_string"
}</code></pre>
                </div>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Response (201 Created)</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "success": true,
  "data": {
    "id": "19",
    "firstname": "John",
    "lastname": "Doe",
    "nickname": "Johnny",
    "email": "john@example.com",
    "mobile": "+1234567890",
    "status": "active",
    "created_at": "2024-01-15T10:30:00Z"
  }
}</code></pre>
                </div>
                
                <button class="btn btn-sm" onclick="testEndpoint('cardholders', 'POST')" style="background: #0066FF; color: white; border: none; border-radius: 6px; padding: 6px 14px; font-size: 0.8rem;">
                    <i class="fas fa-play me-1"></i> Test Endpoint
                </button>
            </div>

            <!-- Endpoint 2: Create Card -->
            <div class="p-4 border-bottom" style="border-color: #E2E8F0 !important;">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge" style="background: #E6F9F0; color: #059669; font-size: 0.75rem; padding: 0.5rem 1rem; font-weight: 600;">POST</span>
                    <code style="color: #1a1a2e; font-size: 1rem; font-weight: 600;">/cards</code>
                    <span class="text-muted ms-auto">Create Virtual Card</span>
                </div>
                <p class="text-muted mb-3">Create a new virtual card for an existing cardholder.</p>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Request Body</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "cardholder_id": "19",
  "nickname": "My Shopping Card",
  "amount": 100
}</code></pre>
                </div>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Response (201 Created)</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "success": true,
  "data": {
    "id": "card_987654321",
    "cardholder_id": "19",
    "nickname": "My Shopping Card",
    "card_number": "411111XXXXXX1111",
    "expiry_month": "12",
    "expiry_year": "2027",
    "cvv": "123",
    "balance": 100.00,
    "currency": "USD",
    "status": "active",
    "created_at": "2024-01-15T10:30:00Z"
  }
}</code></pre>
                </div>
                
                <button class="btn btn-sm" onclick="testEndpoint('cards', 'POST')" style="background: #0066FF; color: white; border: none; border-radius: 6px; padding: 6px 14px; font-size: 0.8rem;">
                    <i class="fas fa-play me-1"></i> Test Endpoint
                </button>
            </div>

            <!-- Endpoint 3: Topup Card -->
            <div class="p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="badge" style="background: #E6F9F0; color: #059669; font-size: 0.75rem; padding: 0.5rem 1rem; font-weight: 600;">POST</span>
                    <code style="color: #1a1a2e; font-size: 1rem; font-weight: 600;">/cards/{id}/topup</code>
                    <span class="text-muted ms-auto">Topup a Card</span>
                </div>
                <p class="text-muted mb-3">Add funds to an existing virtual card.</p>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Request Body</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "card_id": "card_987654321",
  "amount": 50.00
}</code></pre>
                </div>
                
                <div class="mb-3">
                    <h6 class="fw-semibold mb-2" style="color: #1a1a2e;">Response (200 OK)</h6>
                    <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code class="language-json" style="color: #64748B; font-size: 0.85rem;">{
  "success": true,
  "data": {
    "id": "card_987654321",
    "previous_balance": 100.00,
    "topup_amount": 50.00,
    "new_balance": 150.00,
    "currency": "USD",
    "status": "active",
    "updated_at": "2024-01-15T14:45:00Z"
  }
}</code></pre>
                </div>
                
                <button class="btn btn-sm" onclick="testEndpoint('cards/1/topup', 'POST')" style="background: #0066FF; color: white; border: none; border-radius: 6px; padding: 6px 14px; font-size: 0.8rem;">
                    <i class="fas fa-play me-1"></i> Test Endpoint
                </button>
            </div>
        </div>
    </div>

    <!-- Code Examples -->
    <div class="card border-0 bg-white mb-4 shadow-sm" style="border-radius: 12px;">
        <div class="card-header bg-white border-bottom py-3 px-4" style="border-radius: 12px 12px 0 0;">
            <h5 class="fw-semibold mb-0" style="color: #1a1a2e;">
                <i class="fas fa-code me-2" style="color: #0066FF;"></i>Code Examples
            </h5>
        </div>
        <div class="card-body p-4">
            <ul class="nav nav-tabs mb-3" style="border-bottom: 1px solid #E2E8F0;">
                <li class="nav-item">
                    <button class="nav-link active" onclick="showCode('php')" id="tab-php" style="color: #0066FF; border-bottom: 2px solid #0066FF; font-weight: 600;">PHP</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="showCode('javascript')" id="tab-javascript" style="color: #64748B; border: none;">JavaScript</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="showCode('python')" id="tab-python" style="color: #64748B; border: none;">Python</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" onclick="showCode('curl')" id="tab-curl" style="color: #64748B; border: none;">cURL</button>
                </li>
            </ul>
            
            <div id="code-php" class="code-block">
                <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code style="color: #64748B; font-size: 0.85rem;">&lt;?php
$apiKey = 'your_api_key_here';
$url = 'https://mbokapay.com/api/v1/cards';

$data = [
    'cardholder_id' => '19',
    'nickname' => 'My Shopping Card',
    'amount' => 100.00
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'X-API-Key: ' . $apiKey
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
print_r($result);</code></pre>
            </div>
            
            <div id="code-javascript" class="code-block d-none">
                <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code style="color: #64748B; font-size: 0.85rem;">const apiKey = 'your_api_key_here';
const url = 'https://mbokapay.com/api/v1/cards';

const data = {
    cardholder_id: '19',
    nickname: 'My Shopping Card',
    amount: 100.00
};

fetch(url, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-API-Key': apiKey
    },
    body: JSON.stringify(data)
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error('Error:', error));</code></pre>
            </div>
            
            <div id="code-python" class="code-block d-none">
                <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code style="color: #64748B; font-size: 0.85rem;">import requests

api_key = 'your_api_key_here'
url = 'https://mbokapay.com/api/v1/cards'

headers = {
    'Content-Type': 'application/json',
    'X-API-Key': api_key
}

data = {
    'cardholder_id': '19',
    'nickname': 'My Shopping Card',
    'amount': 100.00
}

response = requests.post(url, json=data, headers=headers)
result = response.json()
print(result)</code></pre>
            </div>
            
            <div id="code-curl" class="code-block d-none">
                <pre style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto;"><code style="color: #64748B; font-size: 0.85rem;">curl -X POST https://mbokapay.com/api/v1/cards \
  -H "Content-Type: application/json" \
  -H "X-API-Key: your_api_key_here" \
  -d '{
    "cardholder_id": "19",
    "nickname": "My Shopping Card",
    "amount": 100.00
  }'</code></pre>
            </div>
        </div>
    </div>
</div>

<!-- MODAL pour résultat API -->
<div class="modal fade" id="apiResultModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.15);">
            <div class="modal-header border-0 px-4 pt-4">
                <h5 class="modal-title fw-bold" id="apiResultTitle" style="color: #1a1a2e;">
                    <span id="apiResultIcon"></span> API Response
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body px-4 pb-4">
                <div id="apiResultStatus" class="mb-3"></div>
                <pre id="apiResultBody" style="background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 8px; padding: 1rem; overflow-x: auto; max-height: 400px;"><code style="color: #64748B; font-size: 0.85rem;"></code></pre>
            </div>
            <div class="modal-footer border-0 px-4 pb-4">
                <button type="button" class="btn" style="background: #EF4444; color: white; border: none; border-radius: 8px; padding: 8px 20px; font-weight: 600;" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i>Fermer
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function copyToClipboard(text) {
    if (navigator.clipboard) {
        navigator.clipboard.writeText(text).then(function() {
            alert('Copied to clipboard!');
        });
    } else {
        var textArea = document.createElement("textarea");
        textArea.value = text;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Copied to clipboard!');
    }
}

function showCode(language) {
    document.querySelectorAll('.code-block').forEach(function(block) {
        block.classList.add('d-none');
    });
    
    document.getElementById('code-' + language).classList.remove('d-none');
    
    document.querySelectorAll('.nav-link').forEach(function(tab) {
        tab.classList.remove('active');
        tab.style.color = '#64748B';
        tab.style.borderBottom = 'none';
        tab.style.fontWeight = '400';
    });
    
    var activeTab = document.getElementById('tab-' + language);
    activeTab.classList.add('active');
    activeTab.style.color = '#0066FF';
    activeTab.style.borderBottom = '2px solid #0066FF';
    activeTab.style.fontWeight = '600';
}

function showApiResult(status, statusText, body) {
    const icon = document.getElementById('apiResultIcon');
    const statusDiv = document.getElementById('apiResultStatus');
    const bodyPre = document.getElementById('apiResultBody').querySelector('code');
    
    if (status >= 200 && status < 300) {
        icon.innerHTML = '<i class="fas fa-check-circle me-2" style="color: #10B981;"></i>';
        statusDiv.innerHTML = '<span class="badge" style="background: #E6F9F0; color: #059669; font-size: 0.85rem;">✅ ' + status + ' ' + statusText + '</span>';
    } else {
        icon.innerHTML = '<i class="fas fa-exclamation-circle me-2" style="color: #EF4444;"></i>';
        statusDiv.innerHTML = '<span class="badge" style="background: #FEE2E2; color: #DC2626; font-size: 0.85rem;">❌ ' + status + ' ' + statusText + '</span>';
    }
    
    bodyPre.textContent = JSON.stringify(body, null, 2);
    
    var modal = new bootstrap.Modal(document.getElementById('apiResultModal'));
    modal.show();
}

async function testEndpoint(endpoint, method) {
    const apiKey = '<?php echo e($apiKey ? $apiKey->public_key : "pk_test_123456"); ?>';
    const baseUrl = 'http://localhost:8000/api/v1/';
    
    let body = {};
    if (endpoint === 'cardholders') {
        body = {
            firstname: 'John',
            lastname: 'Doe',
            nickname: 'Johnny',
            email: 'john@example.com',
            date_of_birth: '1990-01-15',
            mobile: '+1234567890',
            address: '123 Main Street',
            city: 'New York',
            state: 'NY',
            postal_code: '10001',
            id_type: 'BVN',
            id_number: '12345678901',
            id_front_image: 'base64_image_test',
            id_back_image: 'base64_image_test'
        };
    } else if (endpoint === 'cards') {
        body = {
            cardholder_id: '19',
            nickname: 'My Shopping Card',
            amount: 100
        };
    } else if (endpoint.includes('topup')) {
        body = {
            card_id: 'card_987654321',
            amount: 50
        };
    }
    
    const options = {
        method: method,
        headers: {
            'Content-Type': 'application/json',
            'X-API-Key': apiKey
        }
    };
    
    if (method !== 'GET') {
        options.body = JSON.stringify(body);
    }
    
    try {
        const response = await fetch(baseUrl + endpoint, options);
        const result = await response.json();
        
        showApiResult(response.status, response.statusText, result);
        console.log('API Response:', result);
    } catch (error) {
        showApiResult(0, 'Network Error', {error: error.message});
        console.error('API Error:', error);
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Template::layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/andriamihaja/Desktop/langue/visercard/core/resources/views/templates/basic/user/developer/documentation.blade.php ENDPATH**/ ?>