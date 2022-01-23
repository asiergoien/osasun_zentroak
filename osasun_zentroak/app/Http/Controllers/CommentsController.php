<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use App\Models\User;

class CommentsController extends Controller
{
    public function addComment(Request $request){
        $comment = new Comments;
        $comment->userId = $request->userId;
        $comment->zentroarenKodea = $request->zentroarenKodea;
        $comment->mensaje = $request->mensaje;
        $comment->save();
        return response()->json('se ha creado el comentario');
    }
    public function viewComments(Request $request){
        if(Comments::where('zentroarenKodea', '=', $request->zentroarenKodea)->count()>0){
            $comments = Comments::select('mensaje', 'userId')->where('zentroarenKodea', '=', $request->zentroarenKodea)->get(['mensaje', 'userId']);
            return response()->json([
                $comments,
                'exists'=>'true'
            ], 200);
            // foreach ($comments as $comment){
            //     $user = User::where('id', $comments['userId'])->get();
            //     return response()->json([
            //         'user'=> $user->name,
            //         'mensaje' => $comment['mensaje'],
            //         'exists'=>'true'
            //     ], 200);
            // }
        }else{
            return response()->json([
                'exists'=>'false'
            ], 200);
        }
    }
    // public function __construct()
    // {
    //     $user = auth()->user();

    //     view()->share('user', $user);
    // }
}
