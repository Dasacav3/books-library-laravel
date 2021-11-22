<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = DB::table('books')
            ->join('authors', 'books.id_author', '=', 'authors.id')
            ->join('topics', 'books.id_topic', '=', 'topics.id')
            ->select('books.*', 'authors.full_name', 'topics.name')
            ->get();
        $authors = DB::table('authors')->select('*')->get();
        $topics = DB::table('topics')->select('*')->get();
        return view('books.index', ['books' => $books, 'topics' => $topics, 'authors' => $authors]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->file('image')->hashName();

        $request->file('image')->storeAs('public/images', $imageName);

        $book = new Book();
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->publication_date = $request->publication_date;
        $book->id_author = $request->author;
        $book->id_topic = $request->topic;
        $book->image = $imageName;
        $book->save();

        return redirect('/books');
    }

    public function edit($id)
    {
        $book = DB::table('books')
            ->join('authors', 'books.id_author', '=', 'authors.id')
            ->join('topics', 'books.id_topic', '=', 'topics.id')
            ->select('books.*', 'authors.full_name', 'topics.name')
            ->where('books.id', '=', $id)
            ->get()
            ->first();
        $authors = DB::table('authors')->select('*')->get();
        $topics = DB::table('topics')->select('*')->get();

        return view('books.edit', ['book' => $book, 'topics' => $topics, 'authors' => $authors]);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if ($request->image != null) {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $request->file('image')->hashName();

            $request->file('image')->storeAs('public/images', $imageName);

            Storage::delete('public/images/' . $book->image);

            $book->image = $imageName;
        }

        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->publication_date = $request->publication_date;
        $book->id_author = $request->author;
        $book->id_topic = $request->topic;
        $book->save();

        return redirect('/books');
    }

    public function delete($id)
    {
        $book = Book::find($id);
        Storage::delete('public/images/' . $book->image);
        $book->delete();

        return redirect('/books');
    }
}
