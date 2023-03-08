<?php

namespace App\Services;

use App\Traits\ExternalService;
use Illuminate\Http\Request;

class AuthorService
{

    use ExternalService;

    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }

    public function index()
    {

        $params = array(
            'method' => 'GET',
            'request_url' => '/authors'
        );

        return $this->performRequest($params);
    }

    public function show($author)
    {
        $params = array(
            'method' => 'GET',
            'request_url' => '/authors/' . $author
        );

        return $this->performRequest($params);
    }

    public function store(Request $request)
    {
        $params = array(
            'method' => 'POST',
            'request_url' => '/authors/store',
            'form_data' => $request->all()
        );

        return $this->performRequest($params);
    }

    public function update(Request $request, $author)
    {
        $params = array(
            'method' => 'PUT',
            'request_url' => '/authors/update/' . $author,
            'form_data' => $request->all()
        );

        return $this->performRequest($params);
    }

    public function destroy($author)
    {
        $params = array(
            'method' => 'DELETE',
            'request_url' => '/authors/delete/' . $author
        );

        return $this->performRequest($params);
    }
}
