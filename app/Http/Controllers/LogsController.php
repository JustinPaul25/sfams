<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class LogsController extends Controller
{
    public function index()
    {
        $logs = Notification::with('user')->get();

        return view('system-logs', ['logs' => $logs]);
    }
}
