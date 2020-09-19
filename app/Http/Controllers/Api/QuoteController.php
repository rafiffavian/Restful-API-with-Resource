<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use Illuminate\Http\Request;
use App\Models\Quote;
use Auth;

class QuoteController extends Controller
{
    public function store(Request $request, Quote $quote)
    {
        $this->validate($request, [
            'message'   =>  'required',
        ]);

        $quote = $quote->create([
            'user_id'   => Auth()->user()->id,
            'message'   => $request->message,
        ]);

        return new QuoteResource($quote);
    }
}
