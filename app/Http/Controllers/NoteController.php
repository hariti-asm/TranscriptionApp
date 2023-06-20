<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\View\View;
use App\Http\Controllers\NoteController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use OpenAI\Laravel\Facades\OpenAI;

class NoteController extends Controller
{






    public function store(NoteRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'upload' => 'required|mimetypes:audio/mpeg,audio/wav,audio/ogg,audio/mp3|max:100000',
        ]);

         $file = $request->file('upload');
         $filename = $file->getClientOriginalName(); // Get the original file name
         $file->store('uploads'); // Store the file with the original name

         $validated['upload'] = $filename; // Update the validated data with the file name
    //    $audiopath =$file->storeAs('public/uploads', $filename);
       //return audio path
    //    dd($request->all());
    // $yourApiKey = getenv('OPENAI_API_KEY');
    // $client = OpenAI::client($yourApiKey);
        // $response = $client->audio()->transcribe([
        //     'model' => 'whisper-1',
        //     'file' => fopen('audio.mp3', 'r'),
        //     'response_format' => 'verbose_json',
        // ]);

    //    $transcript= $response->task; // 'transcribe'
    //     $response->language; // 'english'
    //     $response->duration; // 2.95
    //     $transcript=
    //     $response->text; // 'Hello, how are you?'
        $request->user()->notes()->create($validated);
        return redirect()->route('notes.index');

    }




    public function success()
    {
        return view('notes.success');
    }

    public function index(): View
    {
        return view('notes.index', [
            'notes' => Note::with('user')->latest()->get(),
        ]);

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
    public function update(Request $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notes  $notes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note):RedirectResponse
    {
        $this->authorize('delete',$note);
        $note->delete();
        return redirect(route('notes.index'));


    }


}
