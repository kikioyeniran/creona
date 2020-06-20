<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutorial extends Model
{
    protected $table  = 'tutorials';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getTutorials()
    {
        $tutorials = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->paginate(8);
        return $tutorials;
    }
    public function getTutorialsByLink($link)
    {
        $tutorials = $this::where('link', $link)->where('disabled', 'false')->get();
        return $tutorials;
    }
    public function getDisabledTutorials()
    {
        $tutorials = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->paginate(8);
        return $tutorials;
    }
}
