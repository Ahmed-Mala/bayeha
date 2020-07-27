<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ad extends Model
{

  protected $fillable = [
        'title',
        'content',
        'user_id',
        'image',
    ];


  public function user(){
      return $this->belongsTo(User::class);
    }


    public function categories(){
        return $this->belongsToMany(Category::class,'ad_categories',
                'ad_id',
                'category_id');
      }

}
