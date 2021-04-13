<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_no',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */    
    protected $casts = [
        'id' => 'string',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::creating(function ($entry) {
    //         $entry->{$entry->getKeyName()} = (string) Str::uuid();
    //     });
    // }

    // public function getIncrementing()
    // {
    //     return false;
    // }

    // public function getKeyType()
    // {
    //     return 'string';
    // }    

}
