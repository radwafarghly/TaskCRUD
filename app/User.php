<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\Media;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
class User extends Authenticatable implements HasMediaConversions
{
    use Notifiable, HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
 //in V 7 ::;;
    // public function registerMediaCollections()
    // {
    //     $this->addMediaCollection('images');
    //     // you can define as many collections as needed
    // // $this->addMediaCollection('my-other-collection');
        
    // }
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('card')
              ->width(400)
              ->height(300);
                
        $this->addMediaConversion('tumb')
              ->width(100)
              ->height(100);
        
    }

    public function image()
    {
        return $this->hasOne(Media::class, 'id', 'image_id');

    }

    public function getProfileImage()
    {
        return $this->image->getUrl('tumb');
    }
}
