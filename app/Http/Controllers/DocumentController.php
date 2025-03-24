<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:10240', // 10MB
        ]);

        $document = Document::create(['title' => $request->title]);
        $document->addMedia($request->file('file'))->toMediaCollection('uploads');

        return redirect()->back()->with('success', 'Arquivo enviado com sucesso!');
    }

    public function show(Document $document)
    {
        return view('documents.show', compact('document'));
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('documents.index')->with('success', 'Documento deletado com sucesso!');
    }
}
