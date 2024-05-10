<?php

namespace App\Models;

use App\Models\Image;
use App\Models\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Insertion extends Model
{
    use HasFactory, Searchable;


    protected $fillable=[
        'name',
        'price',
        'description',
        // 'image',
        'category_id'

    ];

    public function toSearchableArray()
    {
        $category = $this->category;
        $array = [
            'id'=> $this->id,
            'name'=> $this->name,
            'description'=> $this->description,
            'category'=> $category
        ];
        return $array;
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
        
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAccepted($value)
    {
        $this->is_accepted = $value;
        $this->save();
        return true;
    }

    public static function toBeRevisionedCount()
    {
        return Insertion::where('is_accepted', null)->count();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

}
