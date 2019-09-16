<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TargetGroup
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Target[] $targets
 * @property-read int|null $targets_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TargetGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TargetGroup extends Model
{
    public function targets()
    {
        return $this->hasMany('App\Target');
    }
}
