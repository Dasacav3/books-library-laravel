<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = DB::table('authors')->select('*')->get();
        return view('authors.index', ['authors' => $authors]);
    }

    public function create(Request $request)
    {
        $author = new Author();
        $author->full_name = $request->full_name;
        $author->save();

        return redirect('/authors');
    }

    public function edit($id)
    {
        $author = Author::find($id);

        return view('authors.edit', ['author' => $author]);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);
        $author->full_name = $request->full_name;
        $author->save();

        return redirect('/authors');
    }

    public function delete($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect('/authors');
    }
}
