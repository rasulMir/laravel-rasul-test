<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('active_link')) {
    function active_link(string $url): string {
        return Route::is($url) ? 'active' : '';
    }
}