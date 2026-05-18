<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | USER SIMPAN REVIEW
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {
        $request->validate([
            'rating' => 'required|numeric|min:1|max:5',
            'komentar' => 'required',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'coffee_shop_id' => $id,
            'rating' => $request->rating,
            'komentar' => $request->komentar,
        ]);

        return back()->with('success', 'Review berhasil ditambahkan');
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN LIST REVIEW
    |--------------------------------------------------------------------------
    */

    public function adminIndex()
    {
        $reviews = Review::with('user', 'coffeeShop')
            ->latest()
            ->get();

        return view('admin.review.index', compact('reviews'));
    }


    /*
    |--------------------------------------------------------------------------
    | ADMIN DELETE REVIEW
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $review = Review::findOrFail($id);

        $review->delete();

        return back()->with('success', 'Review berhasil dihapus');
    }
}