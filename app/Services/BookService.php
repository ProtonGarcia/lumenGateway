<?php

namespace App\Services;

use App\Traits\ExternalService;
use Illuminate\Http\Request;

class BookService
{

    use ExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }

    public function index()
    {

        $params = array(
            'method' => 'GET',
            'request_url' => '/books'
        );

        return $this->performRequest($params);
    }

    public function show($book)
    {
        $params = array(
            'method' => 'GET',
            'request_url' => '/books/' . $book
        );

        return $this->performRequest($params);
    }

    public function store(Request $request)
    {
        $params = array(
            'method' => 'POST',
            'request_url' => '/books/store',
            'form_data' => $request->all()
        );

        return $this->performRequest($params);
    }

    public function update(Request $request, $book)
    {
        $params = array(
            'method' => 'PUT',
            'request_url' => '/books/update/' . $book,
            'form_data' => $request->all()
        );

        return $this->performRequest($params);
    }

    public function destroy($book)
    {
        $params = array(
            'method' => 'DELETE',
            'request_url' => '/books/delete/' . $book
        );

        return $this->performRequest($params);
    }
}
