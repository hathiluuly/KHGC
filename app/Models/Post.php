<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table = 'posts';

    protected $fillable = [
      'user_id',
      'slug',
      'content',
      'thumbnail',
      'title',
      'description'
    ];

    protected $attributes = [
      'status' => 0, 
    ];

    public function getFullThumbnailAttribute()
    {
        // Kiểm tra xem có thumbnail hay không
        if ($this->thumbnail) {
            return asset('storage/' . $this->thumbnail);
        }

        // Nếu không có thumbnail, trả về một hình ảnh mặc định hoặc URL khác
        return asset('images/default-thumbnail.jpg');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
