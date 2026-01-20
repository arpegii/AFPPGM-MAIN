<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login / Signup</title>

<style>
body {
    background: linear-gradient(#000, #9a9adf);
    font-family: Arial, sans-serif;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
}
.card {
    background: #fff;
    width: 360px;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,.2);
}
.tabs {
    display: flex;
    background: #eee;
    border-radius: 30px;
    margin-bottom: 20px;
}
.tabs button {
    flex: 1;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 30px;
    background: transparent;
    font-weight: bold;
}
.tabs button.active {
    background: linear-gradient(to right, #004e92, #000428);
    color: #fff;
}
input {
    width: 100%;
    padding: 12px;
    margin: 8px 0;
    border-radius: 25px;
    border: 1px solid #ddd;
}
.submit {
    width: 100%;
    padding: 12px;
    border: none;
    border-radius: 25px;
    background: linear-gradient(to right, #004e92, #000428);
    color: #fff;
    font-size: 16px;
    margin-top: 10px;
}
.form {
    display: none;
}
.form.active {
    display: block;
}
.error {
    color: red;
    margin-bottom: 10px;
    text-align: center;
}
.success {
    color: green;
    margin-bottom: 10px;
    text-align: center;
}

/* Modal Styles */
#verificationModal {
    display: none; /* hidden by default */
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    justify-content: center;
    align-items: center;
    z-index: 50;
}
#verificationModal .modal-content {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    max-width: 300px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
#verificationModal h2 {
    font-size: 20px;
    margin-bottom: 10px;
    color: #004e92;
}
#verificationModal p {
    color: #555;
    margin-bottom: 20px;
}
#verificationModal button {
    padding: 10px 20px;
    background: linear-gradient(to right, #004e92, #000428);
    color: #fff;
    border: none;
    border-radius: 25px;
    cursor: pointer;
    margin: 5px 0;
}
#verificationModal button:hover {
    background: linear-gradient(to right, #000428, #004e92);
}
</style>
</head>

<body>

<div class="card">
    <h2 id="title">Login Form</h2>

    {{-- messages --}}
    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="tabs">
        <button id="loginTab" class="active" onclick="showLogin()">Login</button>
        <button id="signupTab" onclick="showSignup()">Signup</button>
    </div>

    {{-- LOGIN FORM --}}
    <form class="form active" id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <button class="submit">Login</button>
    </form>

    {{-- SIGNUP FORM --}}
    <form class="form" id="signupForm" method="POST" action="{{ route('signup') }}">
        @csrf
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <button class="submit">Signup</button>
    </form>
</div>

<!-- Verification Modal -->
@if(session('resent'))
<div id="verificationModal" class="flex">
    <div class="modal-content">
        <h2>Email Verification Sent!</h2>
        <p>Please check your inbox and click the link to verify your email.</p>
        <button id="resendBtn">Resend Email</button>
        <button id="closeModal">Close</button>
    </div>
</div>
@endif

<script>
function showLogin() {
    document.getElementById('loginForm').classList.add('active');
    document.getElementById('signupForm').classList.remove('active');
    loginTab.classList.add('active');
    signupTab.classList.remove('active');
    title.innerText = 'Login Form';
}

function showSignup() {
    document.getElementById('signupForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');
    signupTab.classList.add('active');
    loginTab.classList.remove('active');
    title.innerText = 'Signup Form';
}

// Modal JS
document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('verificationModal');
    if (modal) {
        const closeBtn = document.getElementById('closeModal');
        const resendBtn = document.getElementById('resendBtn');

        // Show modal
        modal.style.display = 'flex';

        // Close modal
        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        // AJAX Resend Verification Email
        resendBtn.addEventListener('click', () => {
            fetch("{{ route('verification.resend') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    alert('Verification email resent!');
                } else {
                    alert('Error sending verification email.');
                }
            })
            .catch(err => console.error(err));
        });
    }
});
</script>

</body>
</html>
