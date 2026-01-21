<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile | Document Tracking System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-lg flex flex-col">

<!-- Company Logo -->
<div class="p-6 border-b flex items-center justify-center">
    <a href="{{ route('dashboard') }}">
        <img 
            src="{{ asset('images/logo.png') }}" 
            alt="Company Logo"
            class="h-24 w-auto object-contain hover:opacity-80 transition-opacity duration-200"
        >
    </a>
</div>

        <!-- Modules -->
        <nav class="flex-1 p-4 space-y-2">
            <h3 class="text-gray-500 uppercase text-xs mb-2">Modules</h3>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Documents</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Incoming</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Received</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Outgoing</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Hold</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Complete</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Logs</a>
            <a href="#" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded">Track</a>
        </nav>

        <!-- Settings -->
        <div class="p-4 border-t">
            <h3 class="text-gray-500 uppercase text-xs mb-2">Settings</h3>
            <button onclick="openPasswordModal()" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded w-full text-left">
                Change Password
            </button>
            <button onclick="openLogoutModal()" class="flex items-center text-gray-700 hover:text-blue-600 px-2 py-1 rounded w-full text-left">
                Logout
            </button>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 overflow-auto">
        <h1 class="text-2xl font-bold mb-6">My Profile</h1>

        @if(session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <!-- Profile Picture -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-avatar.png') }}" 
                 alt="Profile Picture"
                 class="h-24 w-24 rounded-full object-cover border-2 border-gray-300 mb-2">

            <form action="{{ route('profile.upload') }}" method="POST" enctype="multipart/form-data" class="mb-2">
                @csrf
                <label class="cursor-pointer inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Change Picture
                    <input type="file" name="profile_picture" class="hidden" onchange="this.form.submit()">
                </label>
            </form>

            @if($user->profile_picture)
            <form action="{{ route('profile.remove') }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">
                    Remove Picture
                </button>
            </form>
            @endif
        </div>

<!-- Profile Info Form -->
<div class="space-y-4 max-w-md mx-auto bg-white p-6 rounded shadow">

    <button id="editProfileBtn" type="button" 
            class="mb-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
        Edit Profile
    </button>

    <form id="profileForm" action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Full Name -->
        <div>
            <label class="block text-gray-700 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" 
                   class="w-full p-2 border rounded focus:ring focus:ring-blue-200" 
                   required readonly>
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Email (readonly) -->
        <div>
            <label class="block text-gray-700 mb-1">Email</label>
            <input type="email" value="{{ $user->email }}" readonly 
                   class="w-full p-2 border rounded bg-gray-100 cursor-not-allowed">
        </div>

        <!-- Phone Number -->
        <div>
            <label class="block text-gray-700 mb-1">Phone Number</label>
            <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" 
                   class="w-full p-2 border rounded focus:ring focus:ring-blue-200" readonly>
            @error('phone_number') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Birthdate -->
        <div>
            <label class="block text-gray-700 mb-1">Birthdate</label>
            <input type="date" name="birthdate" 
       value="{{ old('birthdate', $user->birthdate ? $user->birthdate->format('Y-m-d') : '') }}" 
       class="w-full p-2 border rounded focus:ring focus:ring-blue-200">

            @error('birthdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Address -->
        <div>
            <label class="block text-gray-700 mb-1">Address</label>
            <textarea name="address" class="w-full p-2 border rounded focus:ring focus:ring-blue-200" readonly>{{ old('address', $user->address) }}</textarea>
            @error('address') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- City -->
        <div>
            <label class="block text-gray-700 mb-1">City</label>
            <input type="text" name="city" value="{{ old('city', $user->city) }}" 
                   class="w-full p-2 border rounded focus:ring focus:ring-blue-200" readonly>
            @error('city') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Update Button (hidden by default) -->
        <button type="submit" id="updateProfileBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 hidden">
            Update Profile
        </button>
    </form>
</div>

<script>
    const editBtn = document.getElementById('editProfileBtn');
    const form = document.getElementById('profileForm');
    const updateBtn = document.getElementById('updateProfileBtn');

    editBtn.addEventListener('click', () => {
        // Enable all input/textarea fields except email
        form.querySelectorAll('input, textarea').forEach(el => {
            if (!el.hasAttribute('readonly-email')) {
                el.removeAttribute('readonly');
            }
        });

        // Show the update button
        updateBtn.classList.remove('hidden');

        // Hide the edit button
        editBtn.classList.add('hidden');
    });
</script>


<!-- Change Password Modal -->
<div id="passwordModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg w-96 p-6 relative">
        <h2 class="text-xl font-bold mb-4">Change Password</h2>
        <form action="{{ route('profile.password.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-2">
                <label class="block text-gray-700 mb-1">Current Password</label>
                <input type="password" name="current_password" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-2">
                <label class="block text-gray-700 mb-1">New Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 mb-1">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
            </div>

            <div class="flex justify-end space-x-2">
                <button type="button" onclick="closePasswordModal()" class="px-4 py-2 bg-gray-300 rounded hover:bg-gray-400">
                    Cancel
                </button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Update
                </button>
            </div>
        </form>
        <button onclick="closePasswordModal()" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 font-bold">&times;</button>
    </div>
</div>

<!-- Logout Modal -->
<div id="logoutModal" class="fixed inset-0 hidden items-center justify-center bg-black bg-opacity-40 z-50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md mx-4">
        <div class="px-6 py-4 border-b">
            <h3 class="text-lg font-semibold text-gray-800">Confirm Logout</h3>
        </div>
        <div class="px-6 py-4">
            <p class="text-gray-600">Are you sure you want to log out of your account?</p>
        </div>
        <div class="px-6 py-4 border-t flex justify-end space-x-3">
            <button onclick="closeLogoutModal()" class="px-4 py-2 border rounded text-gray-600 hover:bg-gray-100">
                Cancel
            </button>
            <button onclick="document.getElementById('logoutForm').submit()" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">
                Logout
            </button>
        </div>
    </div>
</div>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>

<script>
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
