<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $document = Document::create(['title' => $request->title]);
        $document->addMedia($request->file('file'))->toMediaCollection('uploads');

        return redirect()->back()->with('success', 'Arquivo enviado com sucesso!');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }
}
