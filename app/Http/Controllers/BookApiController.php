<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            Log::info('API: show all books');
        $books = Book::all();
        return response()->json(["success" => true , 
        "data" => $books
    ],200
        ) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        log::info("try to add a book");
        $request->validate([
            "designation" => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'type' => 'nullable|string',
            'langue' => 'nullable|string',
            'editeur' => 'nullable|string',
            'categorie' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try {
            if ($request->hasFile('cover')) {
                $coverPath = $request->file('cover')->store('covers', 'public');
                Log::info("photo added sucefully" , ["path" => $coverPath]);

        } else {
                $coverPath =  'no_banner.jpg';
                Log::info("use the default image");
}

$book = Book::create([
    'designation' => $request->designation,
    'auteur' => $request->auteur,
    'description' => $request->description,
    'prix' => $request->prix,
    'type' => $request->type,
    'langue' => $request->langue,
    'editeur' => $request->editeur,
    'categorie' => $request->categorie,
    'cover' => $coverPath,
]);

  Log::info('book created succefully', [
            'book_id' => $book->id,
            'designation' => $book->designation
        ]);

        return response()->json([
            "success" => true,
            "message" => "book added successfully",
            "data" => $book
        ] , 201);

} catch(Exception $e) {
    Log::error("failed to add  book" , [
        ["error" => $e->getMessage()]
    ]);

    return response()->json([
        "success" => false,
        "message" => "Failed to create bokk"
    ] , 500);
}
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $book = Book::findOrFail($id);

        Log::info('API: show book', ['book_id' => $id]);

        return response()->json([
            'success' => true,
            'data' => $book
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

          Log::info("try to update");

        $book = Book::findOrFail($id);
    


        $request->validate([
             "designation" => 'required|string|max:255',
            'auteur' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric',
            'type' => 'nullable|string',
            'langue' => 'nullable|string',
            'editeur' => 'nullable|string',
            'categorie' => 'nullable|string',
            'cover' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        try {

        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
                Log::info("photo added succefully" , ["path" => $coverPath]);
        } else {
            $coverPath = 'banner1.jpg'; 
            Log::info("show the default image");
        }

            $book->update([
            'designation' => $request->designation,
            'auteur' => $request->auteur,
            'description' => $request->description,
            'prix' => $request->prix,
            'type' => $request->type,
            'langue' => $request->langue,
            'editeur' => $request->editeur,
            'categorie' => $request->categorie,
            'cover' => $coverPath,
        ]);

        return response()->json([
            'success' => true,
            'data' => $book
        ], 200);
    } catch(Exception $e) {
        Log::error("failed during update" , ["error" => $e->getMessage()]);

        return response()->json([
        "success" => false,
        "message" => "Failed to create bokk"
    ] , 500);

    }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
          $book = Book::findOrFail($id);

    Log::warning("try to remove the book" , [
        "book_id" => $book->id,
        "cover" => $book->cover
    ]);

    if (
        $book->cover &&
        $book->cover !== 'no_cover.jpg' &&
        Storage::disk('public')->exists($book->cover)
    ) {
        Storage::disk('public')->delete($book->cover);
        Log::info("the cover deleted");
    }


    $book->delete();
      Log::info('API: book deleted', ['book_id' => $id]);

  return response()->json([
        'success' => true,
        'message' => 'Book deleted successfully'
    ], 200);
    
    }
}