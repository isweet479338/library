<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;
use App\Models\RentList;


class RentModel extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function book(){
        return $this->belongsTo(Book::class);
    }
    
    






}
