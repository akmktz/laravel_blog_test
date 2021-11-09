<?php

namespace App\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Blog.
 *
 * @property User $user
 * @package namespace App\Entities;
 */
class Blog extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The model's attributes.
     *
     * @var array
     */
    protected $attributes = [
        'is_top' => false,
        'title' => '',
        'file' => '',
        'text' => '',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_top' => 'boolean',
        'title' => 'string',
        'file' => 'string',
        'text' => 'string',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'is_top',
        'title',
        'file',
        'text',
    ];

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class, 'user_id');
    }

}
