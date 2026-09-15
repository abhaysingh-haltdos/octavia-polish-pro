<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'category_id',
        'category_name',
        'author_id',
        'author_name',
        'author_role',
        'author_avatar',
        'author_bio',
        'author_socials',
        'read_time',
        'excerpt',
        'summary',
        'content',
        'featured_image',
        'is_featured',
        'is_trending',
        'is_popular',
        'views',
        'status',
        'published_at',
    ];

    protected $casts = [
        'content' => 'array',
        'author_socials' => 'array',
        'is_featured' => 'boolean',
        'is_trending' => 'boolean',
        'is_popular' => 'boolean',
        'views' => 'integer',
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'category',
        'featuredImage',
        'publishDate',
        'readTime',
        'author',
        'tags_list',
        'isFeatured',
        'isTrending',
        'isPopular',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function authorUser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function seoMeta(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    /* Attribute Accessors for View & Legacy JSON Compatibility */

    public function getCategoryAttribute(): string
    {
        if (!empty($this->attributes['category_name'])) {
            return $this->attributes['category_name'];
        }
        $rel = $this->getRelationValue('category');
        if ($rel instanceof Category) {
            return $rel->name;
        }
        return 'Engineering';
    }

    public function getFeaturedImageAttribute(): ?string
    {
        return $this->attributes['featured_image'] ?? null;
    }

    public function getPublishDateAttribute(): string
    {
        return $this->published_at ? $this->published_at->format('F j, Y') : ($this->created_at ? $this->created_at->format('F j, Y') : date('F j, Y'));
    }

    public function getReadTimeAttribute(): string
    {
        return $this->attributes['read_time'] ?? '5 min read';
    }

    public function getIsFeaturedAttribute(): bool
    {
        return (bool) ($this->attributes['is_featured'] ?? false);
    }

    public function getIsTrendingAttribute(): bool
    {
        return (bool) ($this->attributes['is_trending'] ?? false);
    }

    public function getIsPopularAttribute(): bool
    {
        return (bool) ($this->attributes['is_popular'] ?? false);
    }

    public function getAuthorAttribute(): array
    {
        $socials = $this->author_socials ?? [];
        return [
            'name' => $this->author_name ?: 'Octavia Engineering Team',
            'role' => $this->author_role ?: 'Enterprise Solutions & Staffing',
            'avatar' => $this->author_avatar ?: 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?q=80&w=200&auto=format&fit=crop',
            'bio' => $this->author_bio ?: '',
            'linkedin' => $socials['linkedin'] ?? 'https://linkedin.com',
            'twitter' => $socials['twitter'] ?? 'https://twitter.com',
        ];
    }

    public function getTagsListAttribute(): array
    {
        if ($this->relationLoaded('tags')) {
            return $this->tags->pluck('name')->toArray();
        }
        return [];
    }

    /**
     * Convert the model instance to an array with legacy keys.
     */
    public function toViewArray(): array
    {
        $data = $this->toArray();
        $data['category'] = $this->category;
        $data['featuredImage'] = $this->featuredImage;
        $data['publishDate'] = $this->publishDate;
        $data['readTime'] = $this->readTime;
        $data['isFeatured'] = $this->isFeatured;
        $data['isTrending'] = $this->isTrending;
        $data['isPopular'] = $this->isPopular;
        $data['author'] = $this->author;
        $data['tags'] = $this->relationLoaded('tags') ? $this->tags->pluck('name')->toArray() : [];
        return $data;
    }
}
