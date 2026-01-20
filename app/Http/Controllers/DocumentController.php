<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    // Show the form to create a new document
    public function create()
    {
        return view('documents.create');
    }

    // Save a new document
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        Document::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'tracking_number' => 'TRK-' . rand(1000, 9999),
        ]);

        return redirect()->route('dashboard')->with('success', 'Document submitted!');
    }

    // List all documents for the logged-in user
    public function index()
    {
        $documents = Auth::user()->documents()->get();
        return view('documents.index', compact('documents'));
    }
}
