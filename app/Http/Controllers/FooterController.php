<?php

namespace App\Http\Controllers;

use App\Models\FooterSetting;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function edit()
    {
        $footerSetting = FooterSetting::query()->firstOrCreate([], FooterSetting::defaults());

        return view('admin.footer', compact('footerSetting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'brand_title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'useful_title' => ['required', 'string', 'max:255'],
            'useful_links' => ['nullable', 'string'],
            'privacy_title' => ['required', 'string', 'max:255'],
            'privacy_links' => ['nullable', 'string'],
            'contact_title' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'location' => ['nullable', 'string', 'max:255'],
            'facebook_url' => ['nullable', 'string', 'max:255'],
            'twitter_url' => ['nullable', 'string', 'max:255'],
            'copyright' => ['nullable', 'string', 'max:255'],
        ]);

        FooterSetting::query()->firstOrCreate([], FooterSetting::defaults())->update($validated);

        return redirect()->route('admin.footer')->with('success', 'Footer berhasil diperbarui.');
    }
}
