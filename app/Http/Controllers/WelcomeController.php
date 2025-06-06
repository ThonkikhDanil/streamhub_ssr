<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class WelcomeController extends Controller
{
	public function __invoke()
	{
		return Inertia::render('Welcome', [
			'title' => 'Главная',
		]);
	}
}
