<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $table  = 'ebooks';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getEbooks()
    {
        $ebooks = $this::orderBy('created_at', 'desc')->where('disabled', 'false')->paginate(8);
        return $ebooks;
    }
    public function getEbooksByLink($link)
    {
        $ebooks = $this::where('link', $link)->where('disabled', 'false')->get();
        return $ebooks;
    }
    public function getDisabledEbooks()
    {
        $ebooks = $this::orderBy('created_at', 'desc')->where('disabled', 'true')->paginate(8);
        return $ebooks;
    }
}
