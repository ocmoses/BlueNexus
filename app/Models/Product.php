<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'price', 'image', 'description', 'in_stock', 'added_by', 'deleted_by'];

    public function getFormattedPriceAttribute(){
        return number_format($this->price / 100, 2);
    }
    
    public function addedBy(){
        return $this->hasOne(User::class, 'added_by');
    }
}
