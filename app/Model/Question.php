<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    //protected $fillable = ['title','slug','body','category_id','user_id'];
    protected $guarded = [];
    //belongsto pour acceder de Question a user

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //une question a plussier reponce
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    //une question peut accedez a une category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getPathAttribute()
    {
        return asset("api/question/$this->slug");
    }

}
