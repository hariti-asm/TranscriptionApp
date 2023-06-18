<?php

namespace App\Jobs;
use App\Models\Note;
use App\Services\AudioProcessor;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TranscribeNotes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        public Note $note,
    }{}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle( AudioProcessor $processor) :void
    {
        $response = $client->audio()->transcribe([
            'model' => 'whisper-1',
            'file' => fopen('audio.mp3', 'r'),
            'response_format' => 'verbose_json',
        ]);

        $response->task; // 'transcribe'
        $response->language; // 'english'
        $response->duration; // 2.95
        $response->text; // 'Hello, how are you?'

        foreach ($response->segments as $segment) {
            $segment->index; // 0
            $segment->seek; // 0
            $segment->start; // 0.0
            $segment->end; // 4.0
            $segment->text; // 'Hello, how are you?'
            $segment->tokens; // [50364, 2425, 11, 577, 366, 291, 30, 50564]
            $segment->temperature; // 0.0
            $segment->avgLogprob; // -0.45045216878255206
            $segment->compressionRatio; // 0.7037037037037037
            $segment->noSpeechProb; // 0.1076972484588623
            $segment->transient; // false
        }

        $response->toArray(); // ['task' => 'transcribe', ...]
    }
}
