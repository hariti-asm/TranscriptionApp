<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NotesRequest;
use Illuminate\View\View;
use App\Http\Controllers\NoteController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class NoteController extends Controller
{


    // public function upload(NotesRequest $request)
    // {
    //     // Create a variable referencing the uploaded file from the request
    //     $file = $request->file('upload');

    //     // Store the file in storage/app/uploads
    //     $file->store('uploads');

    //     // Redirect to the success msg
    //      return redirect()->route('notes.success');



    // }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $file->store('uploads');
            return response('uploaded successflly');


            return view('notes.upload', [
                'notes' => Note::with('user')->latest()->get(),
            ]);
        }

        return redirect()->back()->withErrors('No file uploaded.');
    }

    public function success()
    {
        return view('notes.success');
    }

    public function index()
    {
        return view('notes.upload');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function show(Notes $notes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function edit(Notes $notes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notes $notes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notes $notes)
    {
        //
    }
}
