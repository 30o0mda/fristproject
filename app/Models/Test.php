<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Test extends Model
{
    use HasFactory, SoftDeletes;
    // const DELETED_AT = 'my_soft_delete';
    protected $fillable = [
        'name',
        'content',
        'status',
        'show',
        'photo'
    ];
    //   static::saving(function ($model) {
//             $model->name = 'saving method from model';

    //         });


    protected static function boot(){
    parent::boot();
    // // //create
    static::created(function ($model) {
        // dd($model);
        static::uplodephoto($model);
        $model->save();
    });
    // // static::creating(function ($model) {});
    // // //update
    // // static::updated(function ($model) {});
    // // static::updating(function ($model) {});
    // // //save
    // // static::saved(function ($model) {});
    static::saving(function ($model) {
        $model->user_id = auth()->user()->id;
        static::uplodephoto($model);
    });
    // // //delete && force delete
    // // static::deleted(function ($model) {});
    // // static::deleting(function ($model) {});
    // // static::forceDeleted(function ($model) {});
    static::forceDeleting(function ($model) {

        static::deletephoto($model);

        dd($model); 
        // $model->save();
    });
    // // //restore
    // // static::restored(function ($model) {});
    // // static::restoring(function ($model) {});
    // // //retrive
    // // static::retrieved(function ($model) {});

    // // static::replicated(function ($model) {});
    static::replicating(function ($model) {
        $model->notifyed_at = now();
    });

    }

//     protected static function boot()
// {
//     parent::boot();


// }



    public static function uplodephoto($model){
        if (request()->hasfile('photo')) {
            if (!empty($model->photo) && Storage::exists($model->photo)) {
                // dd($model->photo);
                Storage::delete($model->photo);
                static::deletephoto($model);
            }
            $model->photo = request()->file('photo')->store('public/images');
        }

    }

    public static function deletephoto($model){
        // dd($model->photo);
        if (!empty($model->photo) && Storage::exists($model->photo)) {
            Storage::delete($model->photo);
        }
    }



    public function getNameattribute($value)
    {
        return $value;
    }
    public function getCreatedAtattribute($value)
    {
        return date('y-M __  H:i', strtotime($value));
    }

    public function getUpdatedAtattribute($value)
    {
        return date('y-M __  H:i', strtotime($value));
    }

    public function getDeletedAtattribute($value)
    {
        return date('y-M __  H:i', strtotime($value));
    }



}
