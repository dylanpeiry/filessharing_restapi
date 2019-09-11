<?php

namespace App;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class File
 *
 * @package App
 * @mixin Eloquent
 * @property int $id
 * @property string $stored_file_name
 * @property string $file_name
 * @property float $size
 * @property string $type
 * @property int $status
 * @property int $id_owner
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|File newModelQuery()
 * @method static Builder|File newQuery()
 * @method static Builder|File query()
 * @method static Builder|File whereCreatedAt($value)
 * @method static Builder|File whereFileName($value)
 * @method static Builder|File whereId($value)
 * @method static Builder|File whereIdOwner($value)
 * @method static Builder|File whereSize($value)
 * @method static Builder|File whereStatus($value)
 * @method static Builder|File whereStoredFileName($value)
 * @method static Builder|File whereType($value)
 * @method static Builder|File whereUpdatedAt($value)
 */
class File extends Model
{
}
