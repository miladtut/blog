<?php

namespace Modules\Posts\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Posts\Database\factories\PostFactory::new();
    }

    public function author(){
        return $this->belongsTo (User::class,'author','id');
    }

    public function authorName(){
        return $this->author()->first()->name;
    }

    public function getImageAttribute($value){
        return asset ("storage/$value");
    }

    public function comments(){
        return $this->hasMany (Comment::class,'post_id','id');
    }
}
