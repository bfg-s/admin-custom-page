<?php

namespace Admin\Extend\AdminCustomPage\Models;

use Admin\Extend\AdminSeo\Traits\Seoable;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * Admin\Extend\AdminCustomPage\Models\Page
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @property int $id
 * @property string $name
 * @property string $content
 * @property int $views
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Admin\Extend\AdminSeo\Models\Seo|null $seo
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereViews($value)
 * @property-read mixed $translations
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLocale(string $column, string $locale)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereLocales(string $column, array $locales)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereJsonContainsLocale(string $column, string $locale, ?mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereJsonContainsLocales(string $column, array $locales, ?mixed $value)
 * @mixin \Eloquent
 */
class Page extends Model
{
    use Seoable;
    use HasTranslations;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name',
        'content',
        'views',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'name' => 'array',
        'content' => 'array',
        'views' => 'integer',
    ];

    /**
     * @var array
     */
    protected array $translatable = [
        'name', 'content'
    ];
}
