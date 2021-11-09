<?php

namespace App\Http\Controllers;

use App\Core\Services\NoteService;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    function __construct(NoteService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $notes = $this->service->getAll();
        return view('welcome', compact('notes'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'content' => 'required',
        ]);
        $this->service
            ->create(
                $request->name,
                $request->content
            );
        return  redirect('/');
    }

    public function delete(int $id)
    {
        $this->service->delete($id);
        return redirect('/');
    }
}
