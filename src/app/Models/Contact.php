<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'last_name',
        // 'first_name',
        'name',
        'gender',
        'email',
        'tel',
        'address',
        'address__building',
        'category_id',
        'detail'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('name', 'like', '%' . $keyword . '%');

            // $query->where('email', 'like', '%' . $keyword . '%');

        }
    }

    public function scopeCategorySearch($query, $category_id)
    {
        if (!empty($category_id)) {
            $query->where('category_id', $category_id);
        }
}


}
