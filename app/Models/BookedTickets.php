<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedTickets extends Model
{
    use HasFactory;
    protected $table = 'booked_tickets';
    public $timestamps = true;

    public function movies()
    {
        return $this->belongsTo(Movies::class,'movie_id','id');
    }
}
