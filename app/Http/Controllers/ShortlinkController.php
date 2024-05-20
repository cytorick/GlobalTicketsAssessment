<?php

namespace App\Http\Controllers;

use App\Models\Shortlink;
use App\Models\ShortlinkStatistic;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShortlinkController extends Controller
{
    // First we have the pages for the Shortlink CRUD operations
    // Then we have the methods for the Shortlink CRUD operations

    // This method will return the Shortlink index page with the Shortlinks for the authenticated user
    public function index()
    {
        // Return the Shortlink index page with the Shortlinks for the authenticated user
        return Inertia::render('Shortlinks/ShortlinksIndex', [
            'shortlinks' => Shortlink::where('user_id', auth()->id())
                ->orderBy('created_at', 'desc')
                ->with('statistics')
                ->get(),
        ]);
    }

    // This method will store a new Shortlink for the authenticated user
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'url' => 'required|string',
            'destination' => 'required|url',
            'title' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'is_disabled' => 'nullable|boolean',
            'is_custom' => 'nullable|boolean',
        ],
        [
            'url.required' => 'The URL field is required.',
            'destination.required' => 'The Destination field is required.',
        ]);

        // Create the Shortlink
        $shortlink = Shortlink::create([
            'user_id' => auth()->id(),
            'url' => $request->url,
            'destination' => $request->destination,
            'title' => $request->title,
            'expires_at' => $request->expires_at,
            'is_disabled' => false,
            'is_custom' => $request->is_custom ?? false,
        ]);

        // Redirect back with a success message
        return back()->with('success', $shortlink->title . ' created successfully.');
    }

    // This method will update an existing Shortlink for the authenticated user
    public function update(Request $request, Shortlink $shortlink)
    {
        // Validate the request
        $request->validate([
            'url' => 'required|string',
            'destination' => 'required|url',
            'title' => 'nullable|string',
            'expires_at' => 'nullable|date',
            'is_disabled' => 'nullable|boolean',
            'is_custom' => 'nullable|boolean',
        ],
        [
            'url.required' => 'The URL field is required.',
            'destination.required' => 'The Destination field is required.',
        ]);

        // Update the Shortlink
        $shortlink->update([
            'url' => $request->url,
            'destination' => $request->destination,
            'title' => $request->title,
            'expires_at' => $request->expires_at,
            'is_disabled' => $request->is_disabled ?? false,
            'is_custom' => $request->is_custom ?? false,
        ]);

        // Redirect back with a success message
        return back()->with('success', $shortlink->title . ' updated successfully.');
    }

    // This method will delete an existing Shortlink for the authenticated user
    public function destroy(Shortlink $shortlink)
    {
        // Delete the Shortlink
        $shortlink->delete();

        // Redirect back with a success message
        return back()->with('success', $shortlink->title . ' deleted successfully.');
    }

    // This method will redirect the user to the destination of the Shortlink
    public function redirectShortlink($shortlink)
    {
        // Find the Shortlink by the URL
        $shortlink = Shortlink::where('url', $shortlink)->firstOrFail();

        // Create a new ShortlinkStatistic
        ShortlinkStatistic::create([
            'shortlink_id' => $shortlink->id,
            'user_agent' => request()->header('User-Agent'),
            'ip_address' => request()->ip() ?? null,
        ]);

        // Check if the Shortlink is disabled
        if ($shortlink->is_disabled) {
            return redirect()->back()->with('error', 'Shortlink is disabled');
        }

        // Check if the Shortlink has expired
        if ($shortlink->expires_at && now()->gt($shortlink->expires_at)) {
            return redirect()->back()->with('error', 'Shortlink has expired');
        }

        // Redirect the user to the destination of the Shortlink
        return redirect($shortlink->destination);
    }
}
