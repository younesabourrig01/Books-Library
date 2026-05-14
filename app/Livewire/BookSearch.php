<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Book;
use App\Models\Caterories;
use App\Models\Tags;

class BookSearch extends Component
{
    use WithPagination;

    public $category_id = '';
    public $tag_id = '';
    public $sort_by = '';

    protected $queryString = [
        'category_id' => ['except' => ''],
        'tag_id' => ['except' => ''],
        'sort_by' => ['except' => ''],
    ];

    public function updated($property)
    {
        if (in_array($property, ['category_id', 'tag_id', 'sort_by'])) {
            $this->resetPage();
        }
    }

    public function render()
    {
        $query = Book::with(['category', 'tag']);

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->tag_id) {
            $query->where('tag_id', $this->tag_id);
        }

        switch ($this->sort_by) {
            case 'prix':
                $query->orderBy('prix');
                break;
            case 'titre':
                $query->orderBy('designation');
                break;
            case 'date':
                $query->latest();
                break;
        }

        return view('livewire.book-search', [
            'books' => $query->paginate(10),
            'categories' => Caterories::all(),
            'tags' => Tags::all(),
        ]);
    }
}
