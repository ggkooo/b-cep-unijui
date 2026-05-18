<?php

use Illuminate\Support\Facades\Route;

// Health check route for monitoring and uptime probes
Route::get('/health', function () {
	return response()->json([
		'status' => 'ok',
		'timestamp' => now()->toISOString(),
	]);
});

// You can add more API routes below.

// Debug route to inspect incoming headers (use for diagnosing auth issues)
Route::get('/debug-headers', function () {
	return response()->json([
		'headers' => request()->headers->all(),
	]);
});
