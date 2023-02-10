<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    public $timestamp=true;
    protected $fillable=['title','body'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}