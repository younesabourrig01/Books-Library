<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getPaginatedBooks()
    {
        return Book::paginate(8);
    }

    public function index()
    {
        Log::info('Navigated to all books page');
        return view('book.index', [
            'books' => $this->getPaginatedBooks()
        ]);
    }

    public function search()
    {
        $categories = \App\Models\Caterories::all();
        $tags = \App\Models\Tags::all();
        return view('books', [
            'books' => $this->getPaginatedBooks(),
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    public function find(Request $request)
    {
        $query = Book::query();

        // Apply filters
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('tag_id')) {
            $query->where('tag_id', $request->tag_id);
        }

        // Apply sorting
        switch ($request->input('sort_by', '')) {
            case 'prix':
                $query->orderBy('prix');
                break;
            case 'titre':
                $query->orderBy('designation'); // Changed from 'titre' to 'designation' based on schema
                break;
            case 'date':
                $query->latest();
                break;
        }

        $books = $query->paginate(10)->withQueryString();
        $categories = \App\Models\Caterories::all();
        $tags = \App\Models\Tags::all();

        return view('books', compact('books', 'categories', 'tags'));
    }

    public function create()
    {
        Log::info('Navigated to create new book form');
        $categories = \App\Models\Caterories::all();
        $tags = \App\Models\Tags::all();
        return view('book.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'tag_id' => 'nullable|exists:tags,id',
            'category_id' => 'nullable|exists:caterories,id',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $book = new Book();
        $book->designation = $request->input('designation');
        $book->auteur = $request->input('auteur');
        $book->editeur = $request->input('editeur');
        $book->prix = $request->input('prix');
        $book->tag_id = $request->input('tag_id');
        $book->category_id = $request->input('category_id');
        $book->description = $request->input('description');

        if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
            $image = $request->file('cover');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('covers'), $imageName);
            $book->cover = $imageName;
        }

        $book->save();

        Log::info('Book added successfully', ['book_id' => $book->id]);

        return redirect()->route('book.index')->with('success', 'Livre ajouté avec succès.');
    }

    public function show(string $id)
    {
        $book = Book::with(['category', 'tag'])->findOrFail($id);

        Log::info('Viewing book details', [
            "book_id" => $book->id
        ]);

        return view('book.show', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $categories = \App\Models\Caterories::all();
        $tags = \App\Models\Tags::all();

        Log::info('Editing book', ["book_id" => $book->id]);

        return view('book.edit', compact('book', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'designation' => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'prix' => 'required|numeric|min:0',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $book = Book::findOrFail($id);
        $book->designation = $request->designation;
        $book->auteur = $request->auteur;
        $book->editeur = $request->editeur;
        $book->prix = $request->prix;
        $book->tag_id = $request->tag_id;
        $book->category_id = $request->category_id;
        $book->description = $request->description;

        if ($request->hasFile('cover')) {
            if ($book->cover && file_exists(public_path('covers/' . $book->cover))) {
                unlink(public_path('covers/' . $book->cover));
            }
            $image = $request->file('cover');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('covers'), $imageName);
            $book->cover = $imageName;
        }

        $book->save();

        Log::info('Book updated successfully', ['book_id' => $id]);

        return redirect()->route('book.index')->with('success', 'Livre modifié avec succès.');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->cover && $book->cover != 'no_cover.jpg') {
            if (file_exists(public_path('covers/' . $book->cover))) {
                unlink(public_path('covers/' . $book->cover));
            }
        }

        $book->delete();

        Log::warning('Book deleted', ['book_id' => $id]);

        return redirect()->route('book.index')->with('success', 'Livre supprimé avec succès.');
    }
}