<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EnumStatus;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
      'user_id',
      'slug',
      'content',
      'thumbnail',
      'title',
      'status',
      'description'
    ];

    

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
