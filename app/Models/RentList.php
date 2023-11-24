<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Book;
use App\Models\RentModel;


class RentList extends Model
{
    use HasFactory;
    protected $table = 'rentlist';

    
    public function user(){
        return $this->belongsTo(RentModel::class, 'rent_user_id');
    }
     public function book(){
        return $this->belongsTo(Book::class, 'book_id');
    }










    
}
