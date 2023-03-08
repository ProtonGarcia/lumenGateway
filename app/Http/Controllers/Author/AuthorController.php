<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use App\Services\AuthorService;
use App\Traits\ApiResponse;
// use App\Traits\AuthorService;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponse;

    public $authorService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    //

    public function index()
    {
        return $this->jsonResponse('index author', $this->authorService->index());
        // return $this->jsonResponse('gateway authors');
    }

    public function show($author)
    {
        return $this->jsonResponse('show author', $this->authorService->show($author));
    }

    public function store(Request $request)
    {
        return $this->jsonResponse('store author', $this->authorService->store($request));
    }

    public function update(Request $request, $author)
    {
        return $this->jsonResponse('update author', $this->authorService->update($request, $author));
    }

    public function destroy($author)
    {
        return $this->jsonResponse('destroy author', $this->authorService->destroy($author));
    }
}
