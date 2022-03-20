<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ContactModal
 *
 * @property int $id
 * @property string $name
 * @property string $subject
 * @property string $review
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal query()
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereReview($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereSubject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ContactModal whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContactModal extends Model
{
    public bool $timestamps = true;
}
