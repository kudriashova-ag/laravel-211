<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['name', 'description'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected function shortDescription(): Attribute
    {
        return Attribute::make(
            get: fn(mixed $value, array $attributes) => Str::words($attributes['description'], 5, '...'),
        );
    }

    protected function image(): Attribute{
        return Attribute::make(
            get: fn(mixed $value) => $value ? 'storage/' . $value : '/images/no-image.png'
        );
    }

    public function products(){
        return $this->hasMany(Product::class);
    }


}





// set
// $category->description = 'sport'     $attributes['description']    set (Sport) => БД [description]

// get
//  БД [description]    $attributes['description']       get => $category->description
