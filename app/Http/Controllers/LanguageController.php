<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
	public function index(Request $request, $locale) {
		// set application locate
		app()->setlocale($locale);

		return next($request);
	}
}
