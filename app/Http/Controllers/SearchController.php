<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchRequest;

class SearchController extends Controller
{
    public function search(SearchRequest $request)
    {
        // todo search logic
        dd($request->all());
    }
}
