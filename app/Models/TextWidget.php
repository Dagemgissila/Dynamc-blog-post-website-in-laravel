<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TextWidget extends Model
{
    use HasFactory;

    protected $fillable=[
        'key',
        'image',
        'content',
        'title',
        'active'
    ];

    public function getTitle(string $key){

        $widget=Cache::get('text-widget-'.$key,function() use ($key){
          return TextWidget::query()->where('key','=',$key)
       ->where('active','=',1)
       ->first();
        });


        if($widget){
            return $widget->title;
        }

        return "";
    }

    public function getContent(string $key){
        $widget=Cache::get('text-widget-'.$key,function() use ($key){
            return TextWidget::query()->where('key','=',$key)
         ->where('active','=',1)
         ->first();
          });

        if($widget){
            return $widget->content;
        }

        return "";
    }
}

