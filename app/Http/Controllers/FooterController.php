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
            'description' => ['required', 'string'],
            'useful_title' => ['required', 'string', 'max:255'],
            'useful_links' => ['required', 'string'],
            'privacy_title' => ['required', 'string', 'max:255'],
            'privacy_links' => ['required', 'string'],
            'contact_title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'location' => ['required', 'string', 'max:255'],
            'facebook_url' => ['required', 'string', 'max:255'],
            'twitter_url' => ['required', 'string', 'max:255'],
            'copyright' => ['required', 'string', 'max:255'],
        ], ['required' => 'Semua harus terisi.']);

        FooterSetting::query()->firstOrCreate([], FooterSetting::defaults())->update($validated);

        return redirect()->route('admin.footer')->with('success', 'Footer berhasil diperbarui.');
    }
}
