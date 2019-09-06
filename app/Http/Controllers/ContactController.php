<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SearchQuery;

class ContactController extends Controller
{
    public function __construct(SearchQuery $searchQuery)
    {
        $this->searchQuery = $searchQuery;
    }

    public function search(Request $request)
    {
        $modelQuery = Contact::where('phone', 'like', '%' . $request->userInput . '%');

        foreach ($this->searchQuery->generate($request->userInput)  as $q) {
            $modelQuery->orWhere('full_name', 'like', '%' . $q . '%');
        }

        return $modelQuery->take(3)->get();
    }
}