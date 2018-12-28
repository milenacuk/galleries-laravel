<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id' 
    ];
    protected $table = 'galleries';

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function images(){
        return $this->hasMany(Image::class);
    }
    public static function getGalleries($request, $user = null) 
    {
        $page = $request['page'];
        $term = $request['term'];
        $query = Gallery::query();
        $query->with('user', 'images');

        if($user) {
            $query->where('user_id', $user);
        }
       
        
            if($term) {
                $query->where(function($query) use ($term){
                    $query->where('title', 'like', '%'.$term.'%')
                      ->orWhere('description','like', '%'.$term.'%')
                      ->orWhereHas('user', function($q) use ($term){
                          $q->where('first_name', 'like', '%'.$term.'%')
                            ->orWhere('last_name','like', '%'.$term.'%');
                      });
                    });
                }
        
       
        $galleries = $query->latest()->paginate(10);
        return compact("galleries");
    }
}
