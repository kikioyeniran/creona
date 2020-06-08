<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtService extends Model
{
    protected $table  = 'art_services';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getArtServices()
    {
        $art_services = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->paginate(8);
        return $art_services;
    }
    public function getArtServiceByLink($link)
    {
        $art_services = $this::where('link', $link)->where('disabled', 'false')->get();
        return $art_services;
    }
    public function getDisabledArtServices()
    {
        $art_services = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->paginate(8);
        return $art_services;
    }
}
