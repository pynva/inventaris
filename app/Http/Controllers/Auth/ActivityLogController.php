<?php

namespace App\Http\Controllers;

use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index()
    {
        // Ambil log terbaru beserta relasi causer (user yang melakukan)
        $logs = Activity::with('causer')->latest()->paginate(10);

        return view('activity_log.index', compact('logs'));
    }
}