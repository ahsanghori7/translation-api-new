<?php

namespace App\Http\Controllers;

use App\Models\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function index(Request $request)
    {
        $query = Translation::query();
        if ($request->has('tag')) {
            $query->where('tag', $request->tag);
        }
        if ($request->has('key')) {
            $query->where('key', 'like', "%{$request->key}%");
        }
        if ($request->has('content')) {
            $query->where('content', 'like', "%{$request->content}%");
        }

        return response()->json($query->paginate(20), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string',
            'locale' => 'required|string',
            'content' => 'required|string',
            'tag' => 'nullable|string',
        ]);

        return Translation::create($validated);
    }

    public function update(Request $request, Translation $translation)
    {
        $translation->update($request->only(['content', 'tag']));

        return response()->json($translation, 200);
    }

    public function exportJson(Request $request)
    {
        $locale = $request->get('locale', 'en');
        $data = Translation::where('locale', $locale)->get()->mapWithKeys(fn ($t) => [$t->key => $t->content]);

        return response()->json($data, 200, ['Content-Type' => 'application/json']);
    }
}
