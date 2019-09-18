<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\EmailSpear
 *
 * @property int $id
 * @property int $email_id
 * @property int $spear_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear whereEmailId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear whereSpearId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\EmailSpear whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailSpear extends Pivot {

}
