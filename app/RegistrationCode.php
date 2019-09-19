<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\RegistrationCode
 *
 * @property int $id
 * @property string $code
 * @property int|null $user
 * @property int $created_by
 * @property bool $redeemed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $creator
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereRedeemed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\RegistrationCode whereUser($value)
 * @mixin \Eloquent
 */
class RegistrationCode extends Model
{
    public function creator()
    {
        return $this->belongsTo('\App\User', 'created_by');
    }

    // public function user(){
    //     return $this->belongsTo('\App\User', 'user');
    // }
}
