<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoritesController extends Controller
{
    public function store(Request $request, Favorite $favorite)
    {
        $user = auth()->user();
        $post_id = $request->post_id;
        $is_favorite = $favorite->isFavorite($user->id, $post_id);

        if(!$is_favorite) {
            $favorite->storeFavorite($user->id, $post_id);
            return back();
        }
        return back();
    }

    public function destroy(Favorite $favorite)
    {
        $user_id = $favorite->user_id;
        $post_id = $favorite->post_id;
        $favorite_id = $favorite->id;
        $is_favorite = $favorite->isFavorite($user_id, $post_id);

        if($is_favorite) {
            $favorite->destroyFavorite($favorite_id);
            return back();
        }
        return back();
    }
}