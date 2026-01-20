@extends('layouts.app')

@section('content')
<h2>Submit New Document</h2>

@if(session('success'))
    <div style="color: green">{{ session('success') }}</div>
@endif

<form action="{{ route('document.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Document Title" required>
    <button type="submit">Submit</button>
</form>
@endsection
