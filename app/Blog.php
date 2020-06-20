<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table  = 'blogs';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getBlogs()
    {
        $blog = $this::orderBy('created_at', 'desc')->where('archived', 'false')->paginate(8);
        return $blog;
    }
    public function getBlogsByLink($link)
    {
        $blog = $this::where('link', $link)->where('archived', 'false')->get()->first();
        return $blog;
    }
    public function getArchivedBlogs()
    {
        $blog = $this::orderBy('created_at', 'desc')->where('archived', 'true')->paginate(8);
        return $blog;
    }
}
