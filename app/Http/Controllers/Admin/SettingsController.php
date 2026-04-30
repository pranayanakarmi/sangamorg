<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    /**
     * Display the settings page.
     */
    public function index()
    {
        // Pass settings data as needed
        return inertia('Admin/Settings', [
            // 'site_name' => config('app.name'),
        ]);
    }
}
