<?php

namespace App;

use App\Role;
use App\Talent;
use App\Suscription;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname', 'nationality', 'address', 'city', 'country', 'document', 'phone', 'abilities', 'email', 'password', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* Roles */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }

    /* Talentos */
    public function talents()
    {
        return $this->hasMany(Talent::class);
    }

    public function suscription()
    {
        return $this->hasOne(Suscription::class);
    }

//Query Scopes

    public function scopeLocation($query, $ubicacion)
    {
        if($ubicacion){
            return $query->where('city', 'LIKE', "%$ubicacion%")
            ->orWhere('country', 'LIKE', "%$ubicacion%")->paginate(10);
        }
    }

    public function scopeTalentTitle($query, $title){
        if($title)
            return $query->where('talents.title','LIKE',"%$title%");
    }

    public function scopeTalentDescription($query, $description){
        if($description)
            return $query->where('talents.description','LIKE',"%$description%");
    }
}
