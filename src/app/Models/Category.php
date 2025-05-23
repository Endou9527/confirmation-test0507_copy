<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function contacts(){
        return $this->hasMany(Contact::class);
    }
}
