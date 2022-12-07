<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Image;

class MultipleImageUpload extends Component
{
    use WithFileUploads;

    public $images = [];
    public $key;

    public function save()
    {
        $this->validate([
            'images.*' => 'image|mimes:png,jpg,pdf|max:25600', // 1MB Max

        ]);

        foreach ($this->images as $key => $image) {
            $this->images[$key] = $image->store('images');
        }

        $this->images = json_encode($this->images);

        Image::create(['image' => $this->images]);

        session()->flash('success', 'Images has been successfully Uploaded.');

        return redirect()->back();
    }

    // public function delete(int $key)
    // {
    //     dd($key);
    //     // unset($this->images[$key]);
    // }

    // public function delete($index){
    //     array_splice($this->images, $index, 1);
    // }

    public function render()
    {
        return view('livewire.multiple-image-upload');
    }
}
