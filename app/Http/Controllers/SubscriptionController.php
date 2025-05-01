<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SubscriptionController extends Controller
{
	public function __invoke()
	{
		$title = 'Подписки';

		return Inertia::render('Subscriptions', compact('title'));
	}
}
