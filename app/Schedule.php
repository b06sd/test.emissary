<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */    
    protected $fillable = [ 'item', 'letter_title', 'organisation', 'location', 'unit_id', 'user_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
