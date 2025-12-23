<?php

namespace App\Http\Controllers;

use App\Models\Screenshot;
use Illuminate\Http\Request;

class ScreenshotController extends Controller
{
    function store(Request $request, $id) {
        if($request->hasfile('screenshots')) {
            foreach($request->file('screenshots') as $file) {
                $screenshot = new Screenshot();
                $screenshot->alt_text = "test";
                $screenshot->image_data = base64_encode(file_get_contents($file->getRealPath()));
                $screenshot->game_id = $id;
                $screenshot->save();
            }
        }

        return redirect()->route('games.show', $id)->with('success', 'Screenshot(s) uploaded successfully.');
    }
}
