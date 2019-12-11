<?php

namespace App\Http\Controllers;
use App\Model\Reply;
use App\Model\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\ReplyResource;
use Symfony\Component\HttpFondation\Response;
class ReplyController extends Controller
{
   
    public function index(Question $question)
    {
        return $question;
        //return Reply::latest()->get();
        return ReplyResource::collection($question->replies);
        
    }

    
    public function store(Question $question, Request $request)
    {
        $reply = $question->replies()->create($request->all());
        return response(['reply'=> new ReplyResource($reply)], Response::HTTP_CREATED);
        
    }

    
    public function show(Question $question, Reply $reply)
    {
        //return new ReplyResource($reply);
        return $reply;
    }
   
    
    
    public function update(Request $request, Reply $reply)
    {
        $reply->update($request->all());
        return response('Update',Response::HTTP_ACCEPTED);
    }

    
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
