<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SearchQuery;

class ContactController extends Controller
{
    public function __construct(SearchQuery $searchQuery, Request $request)
    {
        $this->searchQuery = $searchQuery;
        $this->request = $request;
    }

    public function search()
    {
        $words  = $this->searchQuery->generate(str_split($this->request->userInput));
        // $result = $this->sqlWhereLike($words);

        $result = $this->searchInCollection($words, $this->request->userInput);

        return response()->json([
            'contacts' => $result
        ]);
    }



    protected function searchInCollection(array $words, $numbers)
    {
        return Contact::get()->filter(function ($item) use ($words, $numbers) {
            $match = false;
            if (false !== stristr($item->phone, $numbers)) {
                return true;
            }
            foreach ($words as $w) {
                if (false !== stristr($item->full_name, $w)) {
                    $match = true;
                    break;
                }
            }
            return $match;
        })->values();
    }



    protected function sqlWhereLike(array $words)
    {
        $modelQuery = Contact::where('phone', 'like', '%' . $this->request->userInput . '%');
        foreach ($words  as $q) {
            $modelQuery->orWhere('full_name', 'like', '%' . $q . '%');
        }
        return $modelQuery->get();
    }
}