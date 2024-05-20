<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json(auth()->user());
    }

    public function getShortlinks()
    {
        $shortlinks = Shortlink::where('user_id', auth()->id())->get();

        return response()->json($shortlinks);
    }

    public function createShortlink(Request $request)
    {
        $request->validate([
            'url' => 'required|url',
            'title' => 'required',
            'expires_at' => 'nullable|date',
        ]);

        $shortlink = Shortlink::create([
            'url' => $request->url,
            'title' => $request->title,
            'expires_at' => $request->expires_at,
            'user_id' => auth()->id(),
        ]);

        return response()->json($shortlink);
    }

    public function getShortlink(Shortlink $shortlink)
    {
        if ($shortlink->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($shortlink);
    }

    public function updateShortlink(Request $request, Shortlink $shortlink)
    {
        if ($shortlink->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'url' => 'required|url',
            'title' => 'required',
            'expires_at' => 'nullable|date',
        ]);

        $shortlink->update([
            'url' => $request->url,
            'title' => $request->title,
            'expires_at' => $request->expires_at,
        ]);

        return response()->json($shortlink);
    }

    public function deleteShortlink(Shortlink $shortlink)
    {
        if ($shortlink->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $shortlink->delete();

        return response()->json(['message' => 'Shortlink deleted']);
    }

    public function getShortlinkClicks(Shortlink $shortlink)
    {
        if ($shortlink->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return response()->json($shortlink->statistics->count());
    }
}
