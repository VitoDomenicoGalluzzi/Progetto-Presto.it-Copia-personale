<?php

namespace App\Models;
use App\Models\Insertion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Category extends Model
{
    
    use HasFactory;
    protected $fillable = ['name'];
    
    public function insertions():HasMany
    {
        return $this->hasMany(Insertion::class);
        
    }
}
