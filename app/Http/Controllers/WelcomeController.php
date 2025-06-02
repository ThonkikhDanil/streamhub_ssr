<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Inertia\Inertia;

class WelcomeController extends Controller
{
	public function __invoke()
	{
	    $videos = Video::inRandomOrder()->get();

		return Inertia::render('Welcome', [
			'title' => 'Главная',
			'videos' => $videos,
		]);
	}
}
