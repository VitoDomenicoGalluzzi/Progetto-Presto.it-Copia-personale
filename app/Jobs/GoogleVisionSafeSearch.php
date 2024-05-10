<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionSafeSearch implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $insertion_image_id;

    /**
     * Create a new job instance.
     */
    public function __construct($insertion_image_id)
    {
        $this->insertion_image_id = $insertion_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->insertion_image_id);
        if (!$i){
            return;
        }
        $image = file_get_contents(storage_path('app/public/' . $i->path));

        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();

        $safe = $response->getSafeSearchAnnotation();

        $adult = $safe->getAdult();
        $spoof = $safe->getSpoof();
        $medical = $safe->getMedical();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelyhoodName = [
            'text-secondary bi bi-question-octagon-fill',
            'text-success bi bi-emoji-smile-fill',
            'text-success bi bi-emoji-smile-fill',
            'text-warning bi bi-emoji-neutral-fill',
            'text-warning bi bi-emoji-neutral-fill',
            'text-danger bi bi-emoji-angry-fill'
        ];

        $i->adult = $likelyhoodName[$adult];
        $i->spoof = $likelyhoodName[$spoof];
        $i->medical = $likelyhoodName[$medical];
        $i->violence = $likelyhoodName[$violence];
        $i->racy = $likelyhoodName[$racy];

        $i->save();
    }
}
