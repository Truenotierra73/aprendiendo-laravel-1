<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Repositories\MessagesRespository;

class MessagesController extends Controller
{
    protected $messagesRepository;

    public function __construct(MessagesRespository $messagesRepository)
    {
        $this->middleware('auth')->except(['create', 'store']);
        $this->messagesRepository = $messagesRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = $this->messagesRepository->getPaginated();

        return view('messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create', [
            'message' => new Message()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (auth()->guest()) {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'content' => 'required'
            ]);
        } else {
            $request->validate([
                'content' => 'required'
            ]);
        }

        $this->messagesRepository->store($request);

        return redirect()->route('messages.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->messagesRepository->findById($id);

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $message = $this->messagesRepository->findById($id);

        return view('messages.edit', compact('message'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->guest()) {
            $request->validate([
                'email' => 'required',
                'name' => 'required',
                'content' => 'required'
            ]);
        } else {
            $request->validate([
                'content' => 'required'
            ]);
        }

        $this->messagesRepository->update($request, $id);

        return redirect()->route('messages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = $this->messagesRepository->destroy($id);

        return redirect()->route('messages.index');
    }
}
