<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Services\BookService;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{

    use ApiResponse;
    public $bookService;
    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService, AuthorService $authorService)
    {
        $this->bookService = $bookService;
        $this->authorService = $authorService;
    }


    public function index()
    {
        return $this->jsonResponse('index book', $this->bookService->index());
        // return $this->jsonResponse('gateway authors');
    }

    public function show($book)
    {
        return $this->jsonResponse('show book', $this->bookService->show($book));
    }

    public function store(Request $request)
    {
        if (!$this->authorService->show($request->author_id)) {
           return $this->jsonResponse('No se encontro al author',null, 404);
        }

        return $this->jsonResponse('store book', $this->bookService->store($request));
    }

    public function update(Request $request, $book)
    {
        return $this->jsonResponse('update book', $this->bookService->update($request, $book));
    }

    public function destroy($book)
    {
        return $this->jsonResponse('destroy book', $this->bookService->destroy($book));
    }
}
