<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use FFMpeg\FFProbe;
use Inertia\Inertia;

class VideoController extends Controller
{
	use AuthorizesRequests;

    public function index()
    {
	    $user = Auth::user();

	    $videos = Video::where('uploaded_by', $user->id)
	                   ->latest()
	                   ->paginate(10);

        return inertia::render('Videos/Index', [
            'videos' => $videos,
        ]);
    }

	public function create()
    {
        return inertia::render('Videos/Create');
    }

	public function store(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mov,webm|max:102400', // до 100МБ
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $file = $request->file('video');
        $path = $file->store('videos', 'public');

        // Извлекаем длительность через FFProbe
        $ffprobe = FFProbe::create();
        $duration = $ffprobe
            ->format(storage_path('app/public/' . $path))
            ->get('duration');

        $video = Video::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'filename' => $file->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $file->getClientMimeType(),
            'size' => $file->getSize(),
            'duration' => round($duration),
            'uploaded_by' => Auth::id(),
        ]);

        return redirect()->route('videos.index')->with('success', 'Видео загружено');
    }

	public function show(Video $video)
    {
        return inertia::render('Videos/Show', [
            'video' => $video,
            'videoUrl' => Storage::url($video->path),
        ]);
    }

	public function destroy(Video $video)
    {
        $this->authorize('delete', $video);

        Storage::disk('public')->delete($video->path);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Видео удалено');
    }
}
