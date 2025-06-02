<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use FFMpeg\FFMpeg;
use FFMpeg\Coordinate\TimeCode;
use Illuminate\Support\Str;
use FFMpeg\FFProbe;
use Inertia\Inertia;

class VideoController extends Controller
{
	use AuthorizesRequests;

    public function index()
    {
	    $user = Auth::user();

	    $videos = Video::where('uploaded_by', $user->id)->latest()->paginate(10);

        return inertia::render('Videos/Index', [
			'title' => 'Мои видео',
            'videos' => $videos,
        ]);
    }

	public function create()
    {
        return inertia::render('Videos/Create', [
			'title' => 'Загрузить видео',
		]);
    }

	public function store(Request $request)
	{
	    $request->validate([
	        'title' => 'required|string|max:255',
	        'description' => 'nullable|string',
	        'video' => 'required|file|mimes:mp4,avi,mov|max:512000',
	        'preview' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
	    ]);

	    $file = $request->file('video');
	    $path = $file->store('videos', 'public');

	    $ffmpeg = FFMpeg::create();
	    $video = $ffmpeg->open(Storage::path($path));
	    $ffprobe = FFProbe::create();
	    $duration = $ffprobe
	        ->format(Storage::path($path))
	        ->get('duration');
		$time = min(1, floor($duration / 2));

	    $previewPath = null;

	    if ($request->hasFile('preview')) {
	        $previewFile = $request->file('preview');
	        $previewPath = $previewFile->store('previews', 'public');
	    } else {
	        $framePath = 'previews/' . Str::random(40) . '.jpg';
			$fullFramePath = Storage::path($framePath);

			if (!file_exists(dirname($fullFramePath))) {
			    mkdir(dirname($fullFramePath), 0755, true);
			}
	        $video->frame(TimeCode::fromSeconds($time))->save($fullFramePath);
	        $previewPath = $framePath;
	    }

	    $savedVideo = Video::create([
	        'title' => $request->input('title'),
	        'description' => $request->input('description'),
	        'filename' => $file->getClientOriginalName(),
	        'path' => $path,
	        'mime_type' => $file->getClientMimeType(),
	        'size' => $file->getSize(),
	        'duration' => round($duration),
	        'uploaded_by' => Auth::id(),
	        'preview' => $previewPath,
	    ]);

	    return redirect()->route('videos.index')->with('success', 'Видео успешно загружено.');
	}

	public function show(Video $video)
    {
        return inertia::render('Videos/Show', [
			'title' => $video->title,
            'video' => $video,
            'videoUrl' => '/storage/' . ltrim($video->path, '/'),
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
