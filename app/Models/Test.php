<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory,SoftDeletes;
    // const DELETED_AT = 'my_soft_delete';
    protected $fillable = [
        'name',
        'content',
        'status',
        'show'
    ];

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
