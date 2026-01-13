<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    $books = Book::all(); 
    return view('book.index', compact('books')); 
    log::info('change direction to all books page');
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
        log::info('change direction to form (create new book) page');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'designation' => 'required|string|max:255',
        'auteur' => 'required|string|max:255',
        'prix' => 'required|numeric|min:0',
        'type' => 'required|string|max:255',
        'description' => 'nullable|string',
        'cover' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $book = new Book();
    $book->designation = $request->input('designation');
    $book->auteur = $request->input('auteur');
    $book->editeur = $request->input('editeur');
    // $book->annee = $request->input('annee');
    $book->prix = $request->input('prix');
    $book->type = $request->input('type');
    $book->description = $request->input('description');

    if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
        $image = $request->file('cover');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('covers'), $imageName);
        $book->cover = $imageName;
    }

    $book->save();

    return redirect()->route('book.index')->with('success', 'Livre ajouté avec succès.');

        log::info('book added successfully');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('book.show', compact('book'));
        
        log::info('move to specific book details',[
            "book_id" => $book->$id
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book= Book::findOrFail($id);
        return view('book.edit', compact('book'));

        log::info('Show the form for editing the specified resource',[
            "book_id" => $book->$id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
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
    // $book->annee = $request->annee;
    $book->prix = $request->prix;
    $book->type = $request->type;
    $book->description = $request->description;

    if ($request->hasFile('cover')) {
        if ($book->cover && file_exists(public_path('covers/' . $book->cover))) {
            unlink(public_path('covers/' . $book->cover));
        }
        $image = $request->file('cover');
        $imageName = time().'_'.$image->getClientOriginalName();
        $image->move(public_path('covers'), $imageName);
        $book->cover = $imageName;
    }
    $book->save();

    return redirect()->route('book.index')
        ->with('success', 'Livre modifié avec succès.');

        log::info('Update the specified resource in storage.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $book = Book::findOrFail($id);
    
    if ($book->cover && $book->cover != 'no_cover.jpg') {
        if (file_exists(public_path('covers/' . $book->cover))) {
            unlink(public_path('covers/' . $book->cover));
        }
    }
    
    $book->delete();
    
    return redirect()->route('book.index')->with('success', 'Livre supprimé avec succès.');

    log::warning('Remove the specified resource from storage');
}

}

