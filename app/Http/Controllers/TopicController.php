<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Topic;

class TopicController extends Controller
{
    public function index()
    {
        $topics = DB::table('topics')->select('*')->get();
        return view('topics.index', ['topics' => $topics]);
    }

    public function create(Request $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->save();

        return redirect('/topics');
    }

    public function edit($id)
    {
        $topic = Topic::find($id);

        return view('topics.edit', ['topic' => $topic]);
    }

    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);
        $topic->name = $request->name;
        $topic->save();

        return redirect('/topics');
    }

    public function delete($id)
    {
        $topic = Topic::find($id);
        $topic->delete();

        return redirect('/topics');
    }
}
