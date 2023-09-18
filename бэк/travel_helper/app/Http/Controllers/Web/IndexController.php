<?php

declare(strict_types=1);

namespace App\Http\Controllers\Web;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;

final class IndexController
{
    /**
     * @return RedirectResponse
     */
    public function index(): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->route('web.login');
        }

        return redirect('/app');
    }

    /**
     * @return Application|Factory|View
     */
    public function app(): View|Factory|Application
    {
        return view('app.index');
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function login(): View|Factory|RedirectResponse|Application
    {
        if (auth()->check()) {
            return redirect('/app');
        }

        return view('auth.login');
    }
}
