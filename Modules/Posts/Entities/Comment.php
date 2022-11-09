<?php

namespace Modules\Posts\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected static function newFactory()
    {
        return \Modules\Posts\Database\factories\CommentFactory::new();
    }

    public function user(){
        return $this->belongsTo (User::class,'user_id','id');
    }

    public function userName(){
        return $this->user ()->first ()->name;
    }
}
