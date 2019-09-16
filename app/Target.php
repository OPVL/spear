<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Target
 *
 * @property int $id
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property int $target_group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spear[] $spears
 * @property-read int|null $spears_count
 * @property-read \App\TargetGroup $targetGroup
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereTargetGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Target whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Target extends Model
{
    public function spears()
    {
        return $this->hasMany('App\Spear');
    }

    public function targetGroup(){
        return $this->belongsTo('App\TargetGroup');
    }
}
