<?php

namespace App\Http\Controllers;

use App\Http\Requests\Search\SearchRequest;
use Illuminate\Http\RedirectResponse;

class SearchController extends Controller
{
    public function search(SearchRequest $request): RedirectResponse
    {
        // todo search logic
        return redirect()->route('page.home');
    }
}
