<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    public function RenderDashboard()
    {
        return Inertia::render('Dashboard', [
            'shortlinks' => Shortlink::where('user_id', auth()->id())
            ->with('statistics')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get(),
        ]);
    }

    public function RenderDocumentation()
    {
        return Inertia::render('Documentation');
    }
}
