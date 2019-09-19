<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Spear
 *
 * @property int $id
 * @property int $target_id
 * @property string $hash
 * @property int $success
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Email[] $emails
 * @property-read int|null $emails_count
 * @property-read \App\Target $target
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereTargetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Spear whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Spear extends Model
{
    public function target()
    {
        return $this->belongsTo('App\Target');
    }

    public function emails(){
        return $this->belongsToMany('App\Email');
        // return $this->hasManyThrough('App\Email', 'App\EmailSpear');
    }

    public static function successful(){
        return self::whereSuccess(true)->get();
    }
}
