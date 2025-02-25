<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deals;

class DealsController extends Controller
{

    public function get()
    {
        $deals = Deals::with("users")->get();
        return response()->json($deals);
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
            'users_id' => 'required|exists:user,id',
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
            'users_id' => $request->users_id,
        ]);

        return response()->json([
            'message' => 'Deal created successfully',
            'deal' => $deal
        ], 201);
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

        return response()->json([
            'message' => 'Deal deleted successfully'
        ], 200);
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
