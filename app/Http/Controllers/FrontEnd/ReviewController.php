<?php

namespace App\Http\Controllers\FrontEnd;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function postReview(Request $request) 
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'vote' => 'required',
            'product_id' => 'required',
        ]);

        $review = new Review;
        $review->name = $request->name;
        $review->email = $request->email;
        $review->product_id = $request->product_id;
        $review->vote = $request->vote;
        $review->content = $request->content;
        $review->save();
        
        return back()->with('successMessage','Thêm đánh giá thành công');
    }
    public function removeReview($id)
    {
        $review = Review::find($id);
        $review->delete();

        return back()->with('successMessage','Xóa thành công');
    }
}
