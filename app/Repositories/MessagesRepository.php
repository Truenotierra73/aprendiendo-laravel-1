<?php

namespace App\Repositories;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class MessagesRespository
{
    public function getPaginated(Request $request)
    {
        return Message::with(['user', 'note', 'tags'])->paginate(10);
    }

    public function store(Request $request)
    {
        $message = Message::create([
            'email' => auth()->guest() ? $request->input('email') : '',
            'name' => auth()->guest() ? $request->input('name') : '',
            'content' => $request->input('content')
        ]);

        if (auth()->check()) {
            auth()->user()->messages()->save($message);
        }

        return $message;
    }

    public function findById($id)
    {
        return Message::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $message = $this->findById($id);
        $message->update([
            'email' => auth()->guest() ? $request->input('email') : '',
            'name' => auth()->guest() ? $request->input('name') : '',
            'content' => $request->input('content')
        ]);

        if (auth()->check()) {
            auth()->user()->messages()->save($message);
        }

        return $message;
    }

    public function destroy($id)
    {
        return Message::findOrFail($id)->delete();
    }
}