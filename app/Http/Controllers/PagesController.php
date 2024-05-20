<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PagesController extends Controller
{
    // Render the dashboard page with the shortlinks
    public function RenderDashboard()
    {
        return Inertia::render('Dashboard', [
            'shortlinks' => Shortlink::where('user_id', auth()->id())
            ->with('statistics')
            ->orderBy('created_at', 'desc')
            ->get(),
        ]);
    }

    // Render the documentation page
    public function RenderDocumentation()
    {
        return Inertia::render('Documentation');
    }
}
