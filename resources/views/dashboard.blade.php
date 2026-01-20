<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Dashboard | Document Tracking System</title>
<style>
body {
    font-family: Arial, sans-serif;
    padding: 20px;
    background: #f0f2f5;
}
h1 {
    color: #004e92;
}
nav a {
    margin-right: 15px;
    text-decoration: none;
    color: #004e92;
    font-weight: bold;
}
</style>
</head>
<body>

<h1>Dashboard</h1>

<nav>
    <a href="{{ route('dashboard') }}">Home</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
</nav>

<form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
</form>

<hr>

<h2>Welcome, {{ Auth::user()->name }}</h2>
<p>This is your main dashboard. You can submit new documents or track existing ones.</p>

<a href="{{ route('document.create') }}">Submit New Document</a><br>
<a href="{{ route('document.index') }}">Track Documents</a>

</body>
</html>
