<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class CaseStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'client_name',
        'client_location',
        'industry',
        'service_category',
        'solution_category',
        'technologies',
        'project_duration',
        'team_size',
        'engagement_model',
        'featured_image',
        'hero_banner_image',
        'is_featured',
        'is_latest',
        'short_challenge',
        'result_highlight',
        'business_overview',
        'client_challenges',
        'business_goals',
        'project_objectives',
        'our_approach',
        'discovery_process',
        'solution_architecture',
        'implementation_process',
        'key_features',
        'kpis',
        'metrics',
        'testimonial',
        'status',
        'published_at',
    ];

    protected $casts = [
        'technologies' => 'array',
        'client_challenges' => 'array',
        'business_goals' => 'array',
        'project_objectives' => 'array',
        'discovery_process' => 'array',
        'solution_architecture' => 'array',
        'implementation_process' => 'array',
        'key_features' => 'array',
        'kpis' => 'array',
        'metrics' => 'array',
        'testimonial' => 'array',
        'is_featured' => 'boolean',
        'is_latest' => 'boolean',
        'published_at' => 'datetime',
    ];

    protected $appends = [
        'clientName',
        'clientLocation',
        'serviceCategory',
        'solutionCategory',
        'projectDuration',
        'teamSize',
        'engagementModel',
        'featuredImage',
        'heroBannerImage',
        'isFeatured',
        'isLatest',
        'publishDate',
        'shortChallenge',
        'resultHighlight',
        'businessOverview',
        'clientChallenges',
        'businessGoals',
        'projectObjectives',
        'ourApproach',
        'discoveryProcess',
        'solutionArchitecture',
        'implementationProcess',
        'keyFeatures',
    ];

    public function seoMeta(): MorphOne
    {
        return $this->morphOne(SeoMeta::class, 'seoable');
    }

    /* Attribute Accessors for View & Legacy JSON Compatibility */

    public function getClientNameAttribute(): string
    {
        return $this->attributes['client_name'] ?? '';
    }

    public function getClientLocationAttribute(): ?string
    {
        return $this->attributes['client_location'] ?? null;
    }

    public function getServiceCategoryAttribute(): string
    {
        return $this->attributes['service_category'] ?? '';
    }

    public function getSolutionCategoryAttribute(): ?string
    {
        return $this->attributes['solution_category'] ?? null;
    }

    public function getProjectDurationAttribute(): ?string
    {
        return $this->attributes['project_duration'] ?? null;
    }

    public function getTeamSizeAttribute(): ?string
    {
        return $this->attributes['team_size'] ?? null;
    }

    public function getEngagementModelAttribute(): ?string
    {
        return $this->attributes['engagement_model'] ?? null;
    }

    public function getFeaturedImageAttribute(): ?string
    {
        return $this->attributes['featured_image'] ?? null;
    }

    public function getHeroBannerImageAttribute(): ?string
    {
        return $this->attributes['hero_banner_image'] ?? null;
    }

    public function getIsFeaturedAttribute(): bool
    {
        return (bool) ($this->attributes['is_featured'] ?? false);
    }

    public function getIsLatestAttribute(): bool
    {
        return (bool) ($this->attributes['is_latest'] ?? false);
    }

    public function getPublishDateAttribute(): string
    {
        return $this->published_at ? $this->published_at->format('Y-m-d') : ($this->created_at ? $this->created_at->format('Y-m-d') : date('Y-m-d'));
    }

    public function getShortChallengeAttribute(): ?string
    {
        return $this->attributes['short_challenge'] ?? null;
    }

    public function getResultHighlightAttribute(): ?string
    {
        return $this->attributes['result_highlight'] ?? null;
    }

    public function getBusinessOverviewAttribute(): ?string
    {
        return $this->attributes['business_overview'] ?? null;
    }

    protected function safeJsonArray(string $key): array
    {
        if (!isset($this->attributes[$key])) {
            return [];
        }
        $val = $this->attributes[$key];
        if (is_array($val)) {
            return $val;
        }
        return is_string($val) ? ($this->fromJson($val) ?: []) : [];
    }

    public function getClientChallengesAttribute(): array
    {
        return $this->safeJsonArray('client_challenges');
    }

    public function getBusinessGoalsAttribute(): array
    {
        return $this->safeJsonArray('business_goals');
    }

    public function getProjectObjectivesAttribute(): array
    {
        return $this->safeJsonArray('project_objectives');
    }

    public function getOurApproachAttribute(): ?string
    {
        return $this->attributes['our_approach'] ?? null;
    }

    public function getDiscoveryProcessAttribute(): array
    {
        return $this->safeJsonArray('discovery_process');
    }

    public function getSolutionArchitectureAttribute(): array
    {
        return $this->safeJsonArray('solution_architecture');
    }

    public function getImplementationProcessAttribute(): array
    {
        return $this->safeJsonArray('implementation_process');
    }

    public function getKeyFeaturesAttribute(): array
    {
        return $this->safeJsonArray('key_features');
    }

    public function toViewArray(): array
    {
        $arr = $this->toArray();
        $arr['clientName'] = $this->clientName;
        $arr['clientLocation'] = $this->clientLocation;
        $arr['serviceCategory'] = $this->serviceCategory;
        $arr['solutionCategory'] = $this->solutionCategory;
        $arr['projectDuration'] = $this->projectDuration;
        $arr['teamSize'] = $this->teamSize;
        $arr['engagementModel'] = $this->engagementModel;
        $arr['featuredImage'] = $this->featuredImage;
        $arr['heroBannerImage'] = $this->heroBannerImage;
        $arr['isFeatured'] = $this->isFeatured;
        $arr['isLatest'] = $this->isLatest;
        $arr['publishDate'] = $this->publishDate;
        $arr['shortChallenge'] = $this->shortChallenge;
        $arr['resultHighlight'] = $this->resultHighlight;
        $arr['businessOverview'] = $this->businessOverview;
        $arr['clientChallenges'] = $this->clientChallenges;
        $arr['businessGoals'] = $this->businessGoals;
        $arr['projectObjectives'] = $this->projectObjectives;
        $arr['ourApproach'] = $this->ourApproach;
        $arr['discoveryProcess'] = $this->discoveryProcess;
        $arr['solutionArchitecture'] = $this->solutionArchitecture;
        $arr['implementationProcess'] = $this->implementationProcess;
        $arr['keyFeatures'] = $this->keyFeatures;
        return $arr;
    }
}
