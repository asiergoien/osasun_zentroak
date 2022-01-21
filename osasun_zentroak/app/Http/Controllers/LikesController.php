<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Likes;

class LikesController extends Controller
{
    public function isLiked(Request $request){
        if(Likes::where('userId', '=', $request->userId)->where('zentroarenKodea', '=', $request->zentroarenKodea)->count()>0){
            return response()->json([
                'exists'=>'true'
            ], 200);
        }else{
            return response()->json([
                'exists'=>'false'
            ], 200);
        }
    }
    public function addLike(Request $request){
        $like = new Likes;
        $like->userId = $request->userId;
        $like->zentroarenKodea = $request->zentroarenKodea;
        $like->save();
        return response()->json('se ha creado el like');
    }
    public function disLike(Request $request){
        Likes::where('userId', '=', $request->userId)->where('zentroarenKodea', '=', $request->zentroarenKodea)->delete();
        return response()->json('se ha borrado el like');
    }
    public function __construct()
    {
        $user = auth()->user();

        view()->share('user', $user);
    }
}