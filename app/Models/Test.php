<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;
    // const DELETED_AT = 'my_soft_delete';
    protected $fillable = [
        'name',
        'content',
        'status',
        'show'
    ];
    //   static::saving(function ($model) {
//             $model->name = 'saving method from model';

    //         });


    // protected static function boot(){
    // parent::boot();
    // //create
    // static::created(function ($model) {});
    // static::creating(function ($model) {});
    // //update
    // static::updated(function ($model) {});
    // static::updating(function ($model) {});
    // //save
    // static::saved(function ($model) {});
    // static::saving(function ($model) {});
    // //delete && force delete
    // static::deleted(function ($model) {});
    // static::deleting(function ($model) {});
    // static::forceDeleted(function ($model) {});
    // static::forceDeleting(function ($model) {});
    // //restore
    // static::restored(function ($model) {});
    // static::restoring(function ($model) {});
    // //retrive
    // static::retrieved(function ($model) {});

    // static::replicated(function ($model) {});
    // static::replicatin(function ($model) {});

    // }




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
