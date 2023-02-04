<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use illuminate\Database\Eloquent\SoftDeletes;


class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        "title",
        "description",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }
}
