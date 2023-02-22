<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\User;
use App\Events\NewsCreated;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at','desc')->where('user_id', '=', auth()->id())->get();

        return $news;
    }

    public function singleNews($id)
    {
        try {
            $news = News::findOrFail($id);
            if ($news) {
                return response()->json(['status' => 'success', 'data' => $news]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = $request->user();
            $news = new News();
            $news->title = $request->title;
            $news->content = $request->content;
            if ($user->news()->save($news)) {
                event(new NewsCreated($news));
                return response()->json(['status' => 'success', 'message' => 'News created successfully', 'data' => $news]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $news = News::findOrFail($id);
            $news->title = $request->title;
            $news->content = $request->content;

            if ($news->save()) {
                return response()->json(['status' => 'success', 'message' => 'News updated successfully', 'data' => $news]);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            $news = News::findOrFail($id);
            if ($news->delete()) {
                return response()->json(['status' => 'success', 'message' => 'News deleted successfully']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
