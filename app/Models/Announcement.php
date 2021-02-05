<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Searchable;

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
        $category = $this->category->name;

        $array=[
            'id' =>$this->id,
            'title' =>$this->title,
            'description' =>$this->description,
            'category'=>$category
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
