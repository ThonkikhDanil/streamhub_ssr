<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Video;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'search' => 'required|string|max:255',
        ]);

        $videos = Video::where('title', 'LIKE', '%' . $request->input('search') . '%')
                      ->with('user')
                      ->get();

        return Inertia::render('Search', [
            'title' => 'Результат поиска',
            'videos' => $videos,
            'searchQuery' => $request->input('search'),
        ]);
    }
}
