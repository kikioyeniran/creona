<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class FeaturedWork extends Model
{
    protected $table  = 'featured_works';
    //Primary Key
    public $primaryKey = 'id';
    // Timestamsp
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getQuery()
    {
        $query = DB::table('featured_works')
            ->select(
                'featured_works.id AS fid',
                'featured_works.disabled',
                'featured_works.title',
                'featured_works.price',
                'featured_works.description',
                'featured_works.picture',
                'featured_works.link',
                'featured_works.user_id',
                'featured_works.status',
                'users.id',
                'users.name AS artist',
                'users.email'
            )
            ->join('users', 'featured_works.user_id', '=', 'users.id');
        return $query;
    }
    // Customer dependent DB fetch
    public function getFeaturedWorks()
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->get();
        return $featured_works;
    }
    public function getAllFeaturedWorks()
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->where('status', 'approved')
            ->get();
        return $featured_works;
    }
    // Admin dependent DB fetch
    public function getPendingFeaturedWorks()
    {
        $q = $this->getQuery();
        $featured_works = $q->where('featured_works.disabled', 'false')
            ->where('featured_works.status', 'pending')
            ->get();
        return $featured_works;
    }
    public function getAllFeaturedWorkByLink($link)
    {
        $q = $this->getQuery();
        $featured_works = $q->where('disabled', 'false')
            ->where('status', 'approved')
            ->where('link', $link)
            ->get();
        return $featured_works;
    }
    public function getAllApprovedFeaturedWorks()
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->where('status', 'approved')
            ->get();
        return $featured_works;
    }
    public function getAllDisapprovedFeaturedWorks()
    {
        $q = $this->getQuery();
        $featured_works = $q->where('disabled', 'false')
            ->where('status', 'disapproved')
            ->get();
        return $featured_works;
    }
    public function getAllDisabledFeaturedWorks()
    {
        $q = $this->getQuery();
        $featured_works = $q->where('disabled', 'true')
            ->get();
        return $featured_works;
    }

    // Artist Dependent DB fetch
    public function getArtistFeaturedWorks($user)
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->where('user_id', $user)
            ->where(function ($q) {
                $q->where('status', 'approved')
                    ->orWhere('status', 'pending');
            })
            ->get();
        return $featured_works;
    }
    public function getArtistFeaturedWorksByLink($link)
    {
        $tutorials = $this::where('link', $link)->where('disabled', 'false')->get();
        return $tutorials;
    }
    public function getArtistDisabledFeaturedWorks($user)
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'true')
            ->where('user_id', $user)
            ->get();
        return $featured_works;
    }
    public function getArtistApprovedFeaturedWorks($user)
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->where('user_id', $user)
            ->where('status', 'approved')
            ->get();
        return $featured_works;
    }
    public function getArtistDisapprovedFeaturedWorks($user)
    {
        $featured_works = $this::orderBy('created_at', 'desc')
            ->where('disabled', 'false')
            ->where('user_id', $user)
            ->where('status', 'disapproved')
            ->get();
        return $featured_works;
    }
}
