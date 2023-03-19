<?php

namespace App\Http\Controllers\Api;

use App\Events\MessageDelete;
use App\Events\MessageSent;
use App\Events\MessageUpdate;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChatFormRequest;
use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatApiController extends Controller
{
    public function __construct()
    {
        auth()->user();
//        auth()->loginUsingId(1);
    }

    public function index()
    {
        return Message::all();
    }

    public function messages()
    {
        return Message::query()->with('user')->get();
    }

    public function send(ChatFormRequest $request)
    {

        $message = $request->user()->messages()->create($request->validated());

        Broadcast(new MessageSent($request->user(), $message));

        return $message;
    }

    public function update(Request $request)
    {
        Message::find($request->id)->update([
            'message' => $request->message
        ]);
        $message = Message::find($request->id);

        Broadcast(new MessageUpdate($request->user(), $message));
        return $message;
    }

    public function delete(Request $request)
    {
        Message::find($request->id)->update([
            'message' => "User $request->name delete message...",
            'delete_message' => 1
        ]);
        $message = Message::find($request->id);

        Broadcast(new MessageDelete($request->user(), $message));
        return $message;
    }
}
