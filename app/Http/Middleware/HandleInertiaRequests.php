<?php

namespace App\Http\Middleware;

use App\Models\SocialLink;
use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'auth' => [
                'user' => $request->user(),
            ],
            'socialLinks' => fn () => SocialLink::active()->get()->map(fn ($link) => [
                'id'       => $link->id,
                'name'     => $link->name,
                'url'      => $link->url,
                'icon_url' => $link->icon_url,
            ]),
        ];
    }
}
