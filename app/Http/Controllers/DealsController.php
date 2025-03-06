<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{

    public function get()
    {
        $deals = Deals::with("user")->get();
        return response()->json($deals);
    }

    public function showDeals()
    {
        $deals = Deals::with('user')->get();

        $username = auth()->check() ? auth()->user()->name : null;
        $role = auth()->check() ? auth()->user()->role : null;

        return view('chollos', compact('deals', 'username', 'role'));
    }

    public function myDeals()
{
    $deals = Deals::where('user_id', auth()->id())->get();
    return view('misChollos', compact('deals'));
}


    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'price' => 'required|numeric',
            'previous_price' => 'required|numeric',
            'rating' => 'required|numeric',
            'description' => 'required|string|max:300',
            'category' => 'required|string|max:30',
            'image' => 'required|string|max:300',
            'shop' => 'required|string|max:50',
            'url' => 'required|string|max:300',
            'available' => 'required|boolean',
        ]);
    
        $deal = Deals::create([
            'title' => $request->title,
            'price' => $request->price,
            'previous_price' => $request->previous_price,
            'rating' => $request->rating,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
            'shop' => $request->shop,
            'url' => $request->url,
            'available' => $request->available,
            'user_id' => auth()->id(),
        ]);
    
        return redirect()->route('chollos')->with('message', 'Deal created successfully');
    }
    
    public function delete($id)
    {
        $deal = Deals::find($id);

        if (!$deal) {
            return response()->json([
                'message' => 'Deal not found'
            ], 404);
        }

        $deal->delete();

        return redirect()->route('chollos')->with('message', 'Deal deleted succesfully');

    }

    public function update(Request $request, $id)
    {
        $deal = Deals::find($id);

        if (!$deal) {
            return response()->json([
                'message' => 'Deal not found'
            ], 404);
        }

        $request->validate([
            'title' => 'required|string|max:30',
            'price' => 'required|numeric',
            'previous_price' => 'required|numeric',
            'rating' => 'required|numeric',
            'description' => 'required|string|max:300',
            'category' => 'required|string|max:30',
            'image' => 'required|string|max:300',
            'shop' => 'required|string|max:50',
            'url' => 'required|string|max:300',
            'available' => 'required|boolean',
        ]);

        $deal->update([
            'title' => $request->title,
            'price' => $request->price,
            'previous_price' => $request->previous_price,
            'rating' => $request->rating,
            'description' => $request->description,
            'category' => $request->category,
            'image' => $request->image,
            'shop' => $request->shop,
            'url' => $request->url,
            'available' => $request->available,
        ]);

        return response()->json([
            'message' => 'Deal updated successfully',
            'deal' => $deal
        ], 200);
    }
}
