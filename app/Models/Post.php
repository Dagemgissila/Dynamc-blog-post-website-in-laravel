<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'title',
        'slug',
        'thumblain',
        'body',
        'active',
        'published_at',
        'user_id'
        ];

        protected $casts=[
            'published_at'=>'datetime'
        ];

        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function categories(){
            return $this->belongsToMany(Category::class);
        }
        public function getFormattedDate(){
        return $this->published_at->format(' F j Y');
        }
        public function shortBody(){
            return Str::words(strip_tags($this->body,30));
        }

        public function getThumblain(){
            if(str_starts_with($this->thumblain,'http')){
                return $this->thumblain;
            }

            return '/storage/'.$this->thumbnail;
        }
}
