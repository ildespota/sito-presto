<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use Searchable;
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'category_id',
        'user_id'

        
    ];

   

    public function toSearchableArray()
    { 
        $categories = $this->category->pluck('name')->join(', ');
        $array=[
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'categories'=>$categories
        ];

        return $array;
        
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function toBeRevisioned(){
        return Announcement::where('is_accepted',null)->count();
    }
}
