<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
	public function __invoke()
	{
		$title = 'Главная';

		return Inertia::render('Welcome', compact('title'));
	}
}
