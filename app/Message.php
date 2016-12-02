<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'code',
        'text',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    /**
     * Scope
     */

    public function scopeRelated(Builder $query, User $me, User $another)
    {
        $query->where(function ($query) use ($me, $another) {
            $query->where('from_user_id', '=', $me->id)
                  ->where('to_user_id', '=', $another->id);
        })->orWhere(function ($query) use ($me, $another) {
            $query->where('from_user_id', '=', $another->id)
                  ->where('to_user_id', '=', $me->id);
        });
    }
}
