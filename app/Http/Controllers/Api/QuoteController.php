<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\QuoteResource;
use Illuminate\Http\Request;
use App\Models\Quote;
use Auth;

class QuoteController extends Controller
{

    public function index(Quote $quote)
    {
        $quote = $quote->latest()->paginate(1);

        return QuoteResource::collection($quote);
    }

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

    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    public function update(Request $request, Quote $quote)
    {
        $this->authorize('update', $quote);

        $this->validate($request, [
            'message' => 'required',
        ]);

            $quote->update([
            'message' => $request->message,
        ]);

        return new QuoteResource($quote);
    }

    public function destroy(Quote $quote)
    {
        $this->authorize('delete', $quote);

        $quote->delete();

        return response()->json([
            'message' => 'Your Quote deleted!'
        ]);
    }

}
