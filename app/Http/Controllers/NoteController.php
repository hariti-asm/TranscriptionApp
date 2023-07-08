<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use Illuminate\View\View;
use App\Http\Controllers\NoteController;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
// use OpenAI\Laravel\Facades\OpenAI;
// use OpenAI\
use Illuminate\Support\Facades\env;

class NoteController extends Controller
{





    public function store(NoteRequest $request): RedirectResponse
    {
        $validated = $request->validate([
            'upload' => 'required|mimetypes:audio/mpeg,audio/wav,audio/ogg,audio/mp3|max:100000',
        ]);

         $file = $request->file('upload');
         $filePath= $file->path();
         $filename = $file->getClientOriginalName();
         $mimeType = $file->getMimeType();
         $path = $file->store('public/uploads');
        //  dd($path);

         $validated['upload_path'] = $path;

         $validated['upload'] = $filename;
    //   dd($request->all());


        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.openai.com/v1/audio/transcriptions',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => array(
            'file' => new \CURLFile($filePath, $mimeType, $filename),
            'model' => 'whisper-1'
        ),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer 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',
            'Content-Type: multipart/form-data'
        )
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        curl_close($curl);

        if ($error) {
        dd( "Erreur lors de l'exécution de la requête cURL : " . $error);
        }

        else {
        dd($response);

        // $transcription = json_decode($response, true);
        // if (isset($transcription['error'])) {
        //     dd("Error in transcription API response: " . $transcription['error']['message']);
        // }
        // $text = $transcription['data'][0]['text'];

        // // Update the note with the transcription text
        // $note = new Note($validated);
        // $note->text = $text;
        // $note->save();
}



//         $transcript=
//         $response->text;
//         $request->user()->notes()->create($validated);
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
