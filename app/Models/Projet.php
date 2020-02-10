<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;

class Projet extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'projets';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['id', 'nom', 'slug', 'texte', 'image', 'mise_en_avant', 'clients_id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    public function client() {
        return $this->belongsTo('App\Models\Client', 'clients_id');
    }

    public function tags() {
        return $this->belongsToMany('App\Models\Tag', 'projets_has_tags', 'projets_id', 'tags_id');
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // this is a recommended way to declare event handlers
    public static function boot() {
        
        parent::boot();
        // Attach event handler, on deleting of the article
        Projet::deleting(function($projet) {
            $projet->tags()->detach();
        });
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESSORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */

    public function setImageAttribute($value) {
        $attribute_name = "image";
        $disk = "uploads";
        $destination_path = "images";
        // if the image was erased
        if ($value==null) {
            // delete the image from disk
            \Storage::disk($disk)->delete($this->{$attribute_name});
            // set null in the database column
            $this->attributes[$attribute_name] = null;
        }
        // if a base64 was sent, store it in the db
        if (starts_with($value, 'data:image')) {
            // 0. Make the image
            $image = \Image::make($value)->encode('jpg', 90);
            // 1. Generate a filename.
            $filename = md5($value.time()).'.jpg';
            // 2. Store the image on disk.
            \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
            // 3. Save the path to the database
            $this->attributes[$attribute_name] = $destination_path.'/'.$filename;
        }
    }

}
