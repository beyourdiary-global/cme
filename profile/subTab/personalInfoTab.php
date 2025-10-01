<?php
// Fix the config path for AJAX loading
$config_paths = [
    dirname(dirname(dirname(__FILE__))) . '/config.php',
    '../config.php',
    '../../config.php'
];

$config_loaded = false;
foreach ($config_paths as $config_path) {
    if (file_exists($config_path)) {
        require_once $config_path;
        $config_loaded = true;
        break;
    }
}

if (!$config_loaded) {
    echo '<div class="alert alert-danger">Configuration file not found.</div>';
    exit;
}

// Only start session and check auth if not already done
if (session_status() === PHP_SESSION_NONE) {
    secureSessionStart();
}

if (!isset($_SESSION['user_id'])) {
    echo '<div class="alert alert-warning">Please log in to view this content.</div>';
    exit;
}

$userId = $_SESSION['user_id'];

// Fetch current user info to prefill the form
try {
    $stmt = $pdo->prepare("SELECT first_name, last_name, email, phone, birthdate, gender FROM users WHERE user_id = ?");
    $stmt->execute([$userId]);
    $user = $stmt->fetch();
    if (!$user) {
        echo "User not found.";
        exit;
    }

    // Sanitize the phone number to remove unwanted characters
    $user['phone'] = preg_replace('/[^\d+]/', '', $user['phone']); // Remove anything that's not a digit or '+'
} catch (Exception $e) {
    echo "Database error: " . htmlspecialchars($e->getMessage());
    exit;
}

// Generate new CSRF token for the form
$csrf_token = generateCsrfToken();
?>
<div class="tab-header">
    <h2>Personal Information</h2>
</div>

<div class="personal-info-form" data-aos="fade-up" data-aos-delay="100">
    <div class="error-message text-danger"></div> <!-- empty error container for JS -->

    <form id="personalInfoForm" method="POST" action="">
        <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>" />

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="firstName"
                    value="<?php echo htmlspecialchars($user['first_name']); ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="lastName"
                    value="<?php echo htmlspecialchars($user['last_name']); ?>" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="<?php echo htmlspecialchars($user['email']); ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone"
                    value="<?php echo htmlspecialchars($user['phone']); ?>"
                    pattern="^\+?[0-9]+$"
                    title="Phone number must contain only numbers and optionally start with +">
            </div>
        </div>

        <div class="mb-3">
            <label for="birthdate" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="birthdate" name="birthdate"
                value="<?php echo htmlspecialchars($user['birthdate']); ?>">
        </div>

        <div class="mb-3">
            <label class="form-label d-block">Gender</label>
            <?php
            $genderVal = $user['gender'] ?? '';
            ?>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="m"
                    <?php echo ($genderVal === 'm') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderMale">Male</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="f"
                    <?php echo ($genderVal === 'f') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderFemale">Female</label>
            </div>

            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="o"
                    <?php echo ($genderVal === 'o') ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderOther">Other</label>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
</div>

<!-- Bootstrap Toast Container -->
<div class="toast-container position-fixed top-50 start-50 translate-middle p-3" style="z-index: 11;">
    <div id="notificationToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <div id="toastIcon" class="me-2"></div>
            <strong id="toastTitle" class="me-auto">Notification</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="toastMessage">
            <!-- Message will be inserted here -->
        </div>
    </div>
</div>

<script>
// Function to show Bootstrap Toast
function showToast(message, type = 'success') {
    const toastElement = document.getElementById('notificationToast');
    const toastIcon = document.getElementById('toastIcon');
    const toastTitle = document.getElementById('toastTitle');
    const toastMessage = document.getElementById('toastMessage');
    const toastHeader = toastElement.querySelector('.toast-header');
    
    // Check if Bootstrap is available
    if (typeof bootstrap === 'undefined') {
        // Fallback to simple alert if Bootstrap is not available
        alert(type.toUpperCase() + ': ' + message.replace(/<[^>]*>/g, ''));
        return;
    }
    
    // Hide any existing toast first
    const existingToast = bootstrap.Toast.getInstance(toastElement);
    if (existingToast) {
        existingToast.hide();
    }
    
    // Set icon and styling based on type
    if (type === 'success') {
        toastTitle.textContent = 'Success!';
        toastHeader.className = 'toast-header bg-success text-white';
        toastIcon.innerHTML = '<i class="fas fa-check-circle text-white"></i>';
    } else {
        toastTitle.textContent = 'Error!';
        toastHeader.className = 'toast-header bg-danger text-white';
        toastIcon.innerHTML = '<i class="fas fa-exclamation-triangle text-white"></i>';
    }
    
    // Set message
    toastMessage.innerHTML = message;
    
    // Show toast - both success and error auto-hide
    const toast = new bootstrap.Toast(toastElement, {
        autohide: true, // Auto-hide both success and error
        delay: type === 'success' ? 3000 : 8000 // Success: 3s, Error: 8s
    });
    
    toast.show();
}

document.getElementById('personalInfoForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default form submission
    
    const form = this;
    const formData = new FormData(form);
    const errorElem = document.querySelector('.error-message');
    const submitBtn = form.querySelector('button[type="submit"]');
    
    // Clear previous messages
    errorElem.innerHTML = '';
    
    // Disable submit button and show loading
    submitBtn.disabled = true;
    submitBtn.textContent = 'Saving...';
    
    // Client-side phone validation
    const phoneInput = document.getElementById('phone');
    const phone = phoneInput.value.trim();
    const phonePattern = /^\+?[0-9]+$/;
    
    if (phone !== '' && !phonePattern.test(phone)) {
        showToast('Phone number must contain only numbers and optionally start with +.', 'error');
        phoneInput.focus();
        submitBtn.disabled = false;
        submitBtn.textContent = 'Save Changes';
        return false;
    }
    
    // Use absolute URL to the AJAX file
    const ajaxUrl = '/cme/profile/subTab/personalInfoAjax.php';
    
    console.log('AJAX URL:', ajaxUrl); // Debug log
    
    // Submit form via AJAX
    fetch(ajaxUrl, {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => {
        console.log('Response status:', response.status);
        console.log('Response headers:', response.headers.get('content-type'));
        
        return response.text(); // Get as text first to debug
    })
    .then(text => {
        console.log('Raw response:', text);
        
        try {
            const data = JSON.parse(text);
            console.log('Parsed data:', data);
            
            if (data.success) {
                showToast(data.message, 'success');
            } else {
                if (data.errors && data.errors.length > 0) {
                    const errorList = data.errors.map(error => `<li>${error}</li>`).join('');
                    showToast(`<ul class="mb-0">${errorList}</ul>`, 'error');
                } else {
                    showToast('An unknown error occurred.', 'error');
                }
            }
        } catch (e) {
            console.error('JSON parse error:', e);
            showToast('Server error: ' + text.substring(0, 200), 'error');
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        showToast('Network error: ' + error.message, 'error');
    })
    .finally(() => {
        // Re-enable submit button
        submitBtn.disabled = false;
        submitBtn.textContent = 'Save Changes';
    });
});
</script>
