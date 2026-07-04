<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\Click;

class RedirectController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $code)
    {
        $link = Link::where('short_code', $code)->first();

        Click::create([
            'link_id' => $link->id,
            'ip_address' => $request->ip(),
        ]);

        return redirect()->away($link->original_url);
    }
}
