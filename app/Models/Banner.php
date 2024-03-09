<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{

    protected $table = 'banners';
    public $timestamps = true;

    protected $fillable = [
        'name',
        'image',
        'notes',
        'status',
        'url',
        'item_id',
        'status',
    ];
    protected $casts = ['name' => 'json', 'notes' => 'json'];

    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function setImageAttribute()
    {
        $file = request()->file('image');
        $destinationPath = 'images/banners/';
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $filename);
        $this->attributes['image'] = $filename;
    }


    public function getImageAttribute()
    {
        if ($this->attributes['image']) {
            return asset('images/banners/') . '/' . $this->attributes['image'];
        }
        return asset('logo.png');
    }
    
    
     public function type()
    {
       $result = '';
    
       switch($this->type){
           case "advertisement":
               $result = "اعلان عن كوبون";
               break;
           case "external":
               $result = "رابط خارجي";
               break;
           case "no":
               $result = "لا يوجد";
               break;
           case "popup":
               $result = " اعلان بوب اب";
               break;
           default:
               $result = "لا يوجد";
               break;
       }
       
       return $result;
    }

    
    
}
