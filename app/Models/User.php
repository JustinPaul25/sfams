<?php

namespace App\Models;

use App\Types\RoleType;
use App\Filters\UserFilter;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\MediaLibrary\MediaCollections\File;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    use InteractsWithMedia, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'student_id',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ['role'];

    protected $with = ['branch'];

    public function getRoleAttribute()
    {
        $roles = $this->getRoleNames();
        return $roles[0];
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
        );
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile')
        ->useFallbackUrl('/default_profile.jpg')
        ->useFallbackUrl('/default_profile_thumb.jpg', 'thumb')
        ->useFallbackPath(public_path('/default_profile.jpg'))
        ->useFallbackPath(public_path('/default_profile_thumb.jpg'), 'thumb')
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(150)
                ->height(150);

            $this
                ->addMediaConversion('thumb_2')
                ->width(100)
                ->height(100);
        })
        ->singleFile();
    }

    public function isAdmin(): bool
    {
        return $this->hasRole(RoleType::ADMINISTRATOR);
    }

    public function isStaff(): bool
    {
        return $this->hasRole(RoleType::STAFF);
    }

    public function isStudent(): bool
    {
        return $this->hasRole(RoleType::STUDENT);
    }

    public function isBranch(): bool
    {
        return $this->hasRole(RoleType::BRANCH);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function branch()
    {
        return $this->hasOne(Branch::class);
    }
}
