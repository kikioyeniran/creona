<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table  = 'cards';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getCards()
    {
        $cards = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->paginate(8);
        return $cards;
    }
    public function getCardsByLink($link)
    {
        $cards = $this::where('link', $link)->where('disabled', 'false')->get();
        return $cards;
    }
    public function getDisabledCards()
    {
        $cards = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->paginate(8);
        return $cards;
    }
}
