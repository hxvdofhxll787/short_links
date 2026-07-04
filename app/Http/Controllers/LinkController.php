<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Link;

class LinkController extends Controller
{
    public function create() {
        return view('links.create');
    }

    public function store(Request $request) {
        $request->validate([
            'original_url' => ['required', 'url'],
        ]);

    }

    private function generateUniqCode(): string {
        do {
            $code = Str::random(6);
        } while (Link::where('short_code', $code)->exists());

        return $code;
    }
}
