<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Document Tracking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">

        <!-- Company Logo -->
        <div class="p-6 border-b flex items-center justify-center">
            <img 
                src="{{ asset('images/logo.png') }}" 
                alt="Company Logo"
                class="h-24 w-auto object-contain"
            >
        </div>

        <!-- Modules -->
        <nav class="flex-1 p-4 space-y-2">
            <h3 class="text-gray-500 uppercase text-xs mb-2">Modules</h3>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m2 8H7a2 2 0 01-2-2V6a2 2 0 012-2h5l5 5v9a2 2 0 01-2 2z"/>
                </svg>
                Documents
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0l-3 3m0 0l-3-3m3 3V7"/>
                </svg>
                Incoming
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M5 13l4 4L19 7"/>
                </svg>
                Received
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                </svg>
                Outgoing
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M10 9v6m4-6v6"/>
                </svg>
                Hold
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2l4-4M12 22a10 10 0 110-20 10 10 0 010 20z"/>
                </svg>
                Complete
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-3-3v6m5 4H7a2 2 0 01-2-2V6a2 2 0 012-2h4l2 2h4a2 2 0 012 2v10a2 2 0 01-2 2z"/>
                </svg>
                Logs
            </a>

            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7"/>
                </svg>
                Track
            </a>
        </nav>

        <!-- Settings -->
        <div class="p-4 border-t">
            <h3 class="text-gray-500 uppercase text-xs mb-2">Settings</h3>

            <a href="#" onclick="openPasswordModal()" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 11c0-1.105-.895-2-2-2s-2 .895-2 2 .895 2 2 2 2-.895 2-2zM8 11V7a4 4 0 018 0v4"/>
                </svg>
                Change Password
            </a>

            <a href="#" onclick="openLogoutModal()" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1"/>
                </svg>
                Logout
            </a>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">

<!-- Top Header with Profile on Upper Right -->
<div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold text-gray-800">Dashboard</h1>

    <!-- Profile Picture + User Name -->
    <div class="flex items-center space-x-3">
        <a href="{{ route('profile.show') }}" class="flex items-center space-x-2">
            <img 
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                alt="Profile Picture"
                class="h-12 w-12 rounded-full object-cover border-2 border-gray-300 hover:border-blue-500 transition-all duration-200"
            >
            <span class="text-gray-700 font-medium uppercase hover:text-blue-600 transition-colors duration-200">
                {{ Auth::user()->name }}
            </span>
        </a>
    </div>
</div>



        <p class="text-gray-600">
            This is your main dashboard. Use the sidebar to navigate through modules and settings.
        </p>

        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white shadow rounded p-4">Module Content 1</div>
            <div class="bg-white shadow rounded p-4">Module Content 2</div>
            <div class="bg-white shadow rounded p-4">Module Content 3</div>
        </div>
    </main>
</div>

<!-- Profile Modal -->
<div id="profileModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-96 p-6 relative">
        <h2 class="text-xl font-bold mb-4">Manage Profile Picture</h2>

        <div class="flex justify-center mb-4">
            <img 
                src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/default-avatar.png') }}" 
                alt="Current Profile Picture"
                class="h-24 w-24 rounded-full object-cover border-2 border-gray-300"
            >
        </div>

        <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="mb-4">
            @csrf
            <label class="cursor-pointer inline-block w-full text-center border-2 border-dashed border-gray-300 p-4 rounded hover:border-blue-500">
                Click to upload new picture
                <input type="file" name="profile_picture" class="hidden" onchange="this.form.submit()">
            </label>
        </form>

        @if(Auth::user()->profile_picture)
        <form action="{{ route('profile.remove') }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600">Remove Profile Picture</button>
        </form>
        @endif

        <button onclick="closeProfileModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 font-bold">&times;</button>
    </div>
</div>

<!-- Change Password Modal -->
<div id="passwordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-96 p-6 relative">
        <h2 class="text-xl font-bold mb-4">Change Password</h2>
        <form id="changePasswordForm" action="{{ route('password.update') }}" method="POST">
            @csrf

            <!-- Display errors / success -->
            @if ($errors->any())
                <div class="text-red-500 text-sm mb-2">{{ $errors->first() }}</div>
            @endif
            @if (session('password_updated'))
                <div class="text-green-500 text-sm mb-2">Password updated successfully!</div>
            @endif

            <!-- Current Password -->
            <div class="mb-2 relative">
                <label class="block text-gray-700 mb-1">Current Password</label>
                <input type="password" name="current_password" id="currentPassword" class="w-full p-2 border rounded pr-10" required>
                <button type="button" onclick="togglePasswordVisibility('currentPassword', this)" 
                        class="absolute right-2 top-7 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>

            <!-- New Password -->
            <div class="mb-2 relative">
                <label class="block text-gray-700 mb-1">New Password</label>
                <input type="password" name="new_password" id="new_password" class="w-full p-2 border rounded pr-10" required>
                <button type="button" onclick="togglePasswordVisibility('new_password', this)" 
                        class="absolute right-2 top-7 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>

            <!-- Confirm New Password -->
            <div class="mb-4 relative">
                <label class="block text-gray-700 mb-1">Confirm New Password</label>
                <input type="password" name="new_password_confirmation" id="confirmPassword" class="w-full p-2 border rounded pr-10" required>
                <button type="button" onclick="togglePasswordVisibility('confirmPassword', this)" 
                        class="absolute right-2 top-7 text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 eye-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                    </svg>
                </button>
            </div>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Update Password</button>
        </form>
        <button onclick="closePasswordModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 font-bold">&times;</button>
    </div>
</div>



<!-- Logout Modal (restored old design) -->
<div id="logoutModal"
     class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-40 z-50">

    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <!-- Modal Header -->
        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Confirm Logout</h3>
        </div>

        <!-- Modal Body -->
        <div class="px-6 py-4">
            <p class="text-gray-600">
                Are you sure you want to log out of your account?
            </p>
        </div>

        <!-- Modal Footer -->
        <div class="px-6 py-4 border-t flex justify-end space-x-3">
            <button onclick="closeLogoutModal()"
                    class="px-4 py-2 border rounded text-gray-600 hover:bg-gray-100">
                Cancel
            </button>

            <button onclick="document.getElementById('logoutForm').submit()"
                    class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                Logout
            </button>
        </div>
    </div>
</div>

<!-- Hidden Logout Form -->
<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">
    @csrf
</form>

<!-- Scripts -->
<script>
function openProfileModal() { document.getElementById('profileModal').classList.remove('hidden'); }
function closeProfileModal() { document.getElementById('profileModal').classList.add('hidden'); }

function openPasswordModal() { document.getElementById('passwordModal').classList.remove('hidden'); }
function closePasswordModal() { document.getElementById('passwordModal').classList.add('hidden'); }

function openLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

</body>
</html>