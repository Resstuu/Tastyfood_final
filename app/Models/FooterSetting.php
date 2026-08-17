<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_title',
        'description',
        'useful_title',
        'useful_links',
        'privacy_title',
        'privacy_links',
        'contact_title',
        'email',
        'phone',
        'location',
        'facebook_url',
        'twitter_url',
        'copyright',
    ];

    public static function defaults(): array
    {
        return [
            'brand_title' => 'Tasty Food',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'useful_title' => 'Useful links',
            'useful_links' => "Blog|#\nHewan|#\nGaleri|/galeri\nTestimonial|#",
            'privacy_title' => 'Privacy',
            'privacy_links' => "Karir|#\nTentang Kami|/tentang\nKontak Kami|/kontak\nServis|#",
            'contact_title' => 'Contact Info',
            'email' => 'tastyfood@gmail.com',
            'phone' => '+62 812 3456 7890',
            'location' => 'Kota Bandung, Jawa Barat',
            'facebook_url' => '#',
            'twitter_url' => '#',
            'copyright' => 'Copyright (c)2023 All rights reserved',
        ];
    }

    public static function current(): self
    {
        return static::query()->first() ?? new static(static::defaults());
    }

    public function usefulLinkItems(): array
    {
        return $this->parseLinks($this->useful_links);
    }

    public function privacyLinkItems(): array
    {
        return $this->parseLinks($this->privacy_links);
    }

    private function parseLinks(?string $links): array
    {
        return collect(preg_split('/\r\n|\r|\n/', (string) $links))
            ->map(fn ($line) => trim($line))
            ->filter()
            ->map(function ($line) {
                [$label, $url] = array_pad(explode('|', $line, 2), 2, '#');

                return [
                    'label' => trim($label),
                    'url' => trim($url) ?: '#',
                ];
            })
            ->values()
            ->all();
    }
}
