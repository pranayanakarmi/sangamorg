<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Inertia\Response;

class SocialLinkController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/SocialLinks/Index', [
            'socialLinks' => SocialLink::orderBy('sort_order')->get()->map(fn ($link) => [
                'id'         => $link->id,
                'name'       => $link->name,
                'url'        => $link->url,
                'icon_url'   => $link->icon_url,
                'sort_order' => $link->sort_order,
                'is_active'  => $link->is_active,
            ]),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/SocialLinks/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:100'],
            'url'        => ['required', 'url', 'max:500'],
            'icon'       => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:512'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['boolean'],
        ]);

        if ($request->hasFile('icon')) {
            $data['icon_path'] = $request->file('icon')->store('social-icons', 'public');
        }

        unset($data['icon']);

        SocialLink::create($data);

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link created.');
    }

    public function edit(SocialLink $socialLink): Response
    {
        return Inertia::render('Admin/SocialLinks/Edit', [
            'socialLink' => [
                'id'         => $socialLink->id,
                'name'       => $socialLink->name,
                'url'        => $socialLink->url,
                'icon_url'   => $socialLink->icon_url,
                'sort_order' => $socialLink->sort_order,
                'is_active'  => $socialLink->is_active,
            ],
        ]);
    }

    public function update(Request $request, SocialLink $socialLink): RedirectResponse
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:100'],
            'url'        => ['required', 'url', 'max:500'],
            'icon'       => ['nullable', 'image', 'mimes:png,jpg,jpeg,webp', 'max:512'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['boolean'],
        ]);

        if ($request->hasFile('icon')) {
            // Delete old icon
            if ($socialLink->icon_path) {
                Storage::disk('public')->delete($socialLink->icon_path);
            }
            $data['icon_path'] = $request->file('icon')->store('social-icons', 'public');
        }

        unset($data['icon']);

        $socialLink->update($data);

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link updated.');
    }

    public function destroy(SocialLink $socialLink): RedirectResponse
    {
        if ($socialLink->icon_path) {
            Storage::disk('public')->delete($socialLink->icon_path);
        }

        $socialLink->delete();

        return redirect()->route('admin.social-links.index')
            ->with('status', 'Social link deleted.');
    }
}
