<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

class Contact extends Model
{
    use Searchable;
    protected $guarded = [];
    protected $dates = ['birth_day'];

    public function path() {
        return '/contacts/'.$this->id;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function scopeBirthdays($query)
    {
        return $query->whereRaw('birth_day like "%-' . now()->format('m') . '-%"');
    }

    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birth_day'] = Carbon::parse($birthday);
    }


}
