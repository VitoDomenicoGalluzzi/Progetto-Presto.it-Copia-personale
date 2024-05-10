<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\RemoveFaces;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateInsertion extends Component
{   
    use WithFileUploads;

    public $name;
    public $price;
    public $description;
    public $temporary_images = [];
    public $images = [];
    public $category = 1;
    
    protected $rules=[
        'name'=>'required|max:20',
        'price'=>'required',
        'description'=>'required',
        'images.*'=>'image|max:2048',
        'temporary_images.*'=>'image|max:2048',
        'category'=>'required'
    ];
    
    protected $messages= [
        'required' => 'Il campo è richiesto',
        'max' => 'Il campo deve contenere al massimo 20 caratteri',
        'temporary_images.required'=>'Almeno un\' immagine richesta',
        'temporary_images.*.image'=>'Il / I File devono essere Immagini',
        'temporary_images.*.max'=>'L\'immagine dev\'essere di 2MB massimo',
        'images.image'=>'Il File devono essere Immagini',
        'images.max'=>'L\'immagine dev\'essere di 2MB massimo',
    ];

    public function updatedTemporaryImages()
    {
        if ($this->validate([
            'temporary_images.*'=>'image|max:2048',
        ])) {
            foreach($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        };
    }

    public function removeImage($key) 
    {
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function save()
    {   
        $this->insertion = Category::find($this->category)->insertions()->create($this->validate());

        if(count($this->images)) {
            foreach($this->images as $image) {
                $newFileName = "insertions/{$this->insertion->id}";
                $newImage = $this->insertion->images()->create(['path'=>$image->store($newFileName, 'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 400, 400),
                    new GoogleVisionSafeSearch($newImage->id),
                    new GoogleVisionLabelImage($newImage->id),
                ])->dispatch($newImage->id);
            }

            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        $this->insertion->user()->associate(Auth::user());

        $this->insertion->save();  
        
        
        return redirect()->route('indexInsertion')->with('message', __("ui.successInsertion"));
    }
        
    public function render()
    {
        return view('livewire.create-insertion');
    }
}