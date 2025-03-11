<?php

namespace App\Http\Controllers;

use App\Models\LogEntry;
use Illuminate\Http\Request;

class LogController extends Controller
{
    // app/Http/Controllers/LogController.php
    public function index()
    {
        $logs = LogEntry::orderBy('created_at', 'desc')->paginate(20);
        return response()->json($logs);
    }
}
