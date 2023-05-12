<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildSubCategory extends Model
{
    use HasFactory;


    public function categories(){
        return $this->belongsTo(Category::class,'parent_category_id');
    }

    public function parent_sub_categories(){
        return $this->belongsTo(ParentSubCategory::class,'sub_cat_id');
    }

}
