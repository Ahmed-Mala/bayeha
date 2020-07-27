<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function ads(){
      return $this->belongsToMany(ad::class,'ad_categories',
              'category_id',
              'ad_id');
    }
}
