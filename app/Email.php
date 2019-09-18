<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Email
 *
 * @property int $id
 * @property string $sender
 * @property string $subject
 * @property string $date
 * @property int $fake
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spear[] $spears
 * @property-read int|null $spears_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereFake($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereSender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Email whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Email extends Model
{
    public static function real(){
        return self::whereFake(false)->get();
    }

    public static function fake(){
        return self::whereFake(true)->get();
    }

    public static function randomReal(string $email){
        $all = self::real();
        $ret = $all[rand(0, $all->count() - 1)];

        return $ret->sender != $email ? $ret : self::randomReal($email);
    }

    public function spears()
    {
        // return $this->belongsToMany('App\Spear')->withPivot('email_id', 'spear_id');
        return $this->belongsToMany('App\Spear');
        // return $this->belongsToMany('App\Spear')->using('App\EmailSpear');
        // return $this->belongsToMany('App\Spear', 'email_spear', 'email_id', 'spear_id');
    }
}
