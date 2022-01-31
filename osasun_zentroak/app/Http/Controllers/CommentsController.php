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
        if (Comments::where('zentroarenKodea', '=', $request->zentroarenKodea)->count()>0) {
            $comments = Comments::select('id','mensaje', 'userId')->where('zentroarenKodea', '=', $request->zentroarenKodea)->select('id','mensaje', 'userId')->get();
            $commentBox = [];
            foreach ($comments as $comment) {
                $username = User::where('id', $comment['userId'])->first()->name;
                $comment=['mensaje' => $comment['mensaje'],'usuario' => $username, 'id' => $comment['id']];
                array_push($commentBox, $comment);
            }
            return response()->json($commentBox);
        }
    }
    public function hayComentario(Request $request){
        if(Comments::where('zentroarenKodea', '=', $request->zentroarenKodea)->count()>0){
            return response()->json([
                'exists'=>'true'
            ], 200);
        }else{
            return response()->json([
                'exists'=>'false'
            ], 200);
        }
    }
    public function deleteComment(Request $request){
        Comments::where('id', '=', $request->id)->delete();
        return response()->json('se ha borrado el comentario');
        }
}
    // public function __construct()
    // {
    //     $user = auth()->user();

    //     view()->share('user', $user);
    // }
