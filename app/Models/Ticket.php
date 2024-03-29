<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $primaryKey = 'ticketid';
    protected $table= 'ticket';
    protected $fillable = ['ticket_type', 'price', 'eventid'];
}
