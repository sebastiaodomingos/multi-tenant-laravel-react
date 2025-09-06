<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Filament\Panel;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Traits\BelongsToTenant;

use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthentication;
use Filament\Auth\MultiFactor\App\Contracts\HasAppAuthenticationRecovery;
use Filament\Auth\MultiFactor\Email\Contracts\HasEmailAuthentication;


class User extends Authenticatable implements FilamentUser,HasAppAuthentication, HasAppAuthenticationRecovery,HasEmailAuthentication
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use BelongsToTenant, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'is_active',
        'address_id',
        'language_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'app_authentication_secret',
        'app_authentication_recovery_codes',

    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'app_authentication_secret' => 'encrypted',
            'app_authentication_recovery_codes' => 'encrypted:array',
            'has_email_authentication' => 'boolean'
        ];
    }
    /*
    protected static function booted(): void
    {
        static::addGlobalScope('tenant', function (Builder $query) {
            if (auth()->hasUser()) {
                $query->where('tenant_id', tenant_id());
            }
        });
    }
        */

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->roles->pluck('name')->contains($role);
    }

     /**
     * Get the user's tenant
     */
    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    /**
     * // returns true or false depending on whether the user is allowed to access the $panel
     */
    public function canAccessPanel(\Filament\Panel $panel): bool
    {
        // make tenant available globally
        app()->instance('currentTenant', $this->tenant());

        return match ($panel->getId()) {
            'admin' => $this->hasRole('super_admin'),
            'tenant' => $this->hasRole('tenant_admin'),
            'shop' => $this->hasRole('shop_user') || $this->hasRole('cashier') || $this->hasRole('manager'),//TODO enforce domain
            default => false,
        };
    }

    /**
     * Get the language
     */
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
    /**
     * Get the country
     */
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Get the timezone
     */
    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class);
    }

    /**
     * Get the currency
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    /**
     * Get the address
     */
    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function getAppAuthenticationSecret(): ?string
    {
        // This method should return the user's saved app authentication secret.
    
        return $this->app_authentication_secret;
    }

    public function saveAppAuthenticationSecret(?string $secret): void
    {
        // This method should save the user's app authentication secret.
    
        $this->app_authentication_secret = $secret;
        $this->save();
    }

    public function getAppAuthenticationHolderName(): string
    {
        // In a user's authentication app, each account can be represented by a "holder name".
        // If the user has multiple accounts in your app, it might be a good idea to use
        // their email address as then they are still uniquely identifiable.
    
        return $this->email;
    }
        /**
     * @return ?array<string>
     */
    public function getAppAuthenticationRecoveryCodes(): ?array
    {
        // This method should return the user's saved app authentication recovery codes.
    
        return $this->app_authentication_recovery_codes;
    }

    /**
     * @param  array<string> | null  $codes
     */
    public function saveAppAuthenticationRecoveryCodes(?array $codes): void
    {
        // This method should save the user's app authentication recovery codes.
    
        $this->app_authentication_recovery_codes = $codes;
        $this->save();
    }

        public function hasEmailAuthentication(): bool
    {
        // This method should return true if the user has enabled email authentication.
        
        return $this->has_email_authentication;
    }

    public function toggleEmailAuthentication(bool $condition): void
    {
        // This method should save whether or not the user has enabled email authentication.
    
        $this->has_email_authentication = $condition;
        $this->save();
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
