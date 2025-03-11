<?php

namespace App\Http\Controllers;

use App\Models\LogEntry;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = LogEntry::with('user')
            ->when($request->level, fn($query, $level) => $query->where('level', $level))
            ->latest('created_at')
            ->paginate(20);

        return view('logs.index', compact('logs'));
    }
}
