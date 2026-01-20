@extends('layouts.app')

@section('content')
<h2>Your Documents</h2>

<ul>
@foreach($documents as $doc)
    <li>{{ $doc->title }} - {{ $doc->tracking_number }} - {{ $doc->status }}</li>
@endforeach
</ul>
@endsection
