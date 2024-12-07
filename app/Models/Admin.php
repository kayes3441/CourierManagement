<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'user_type',
        'password',
        'status',
        'admin_role_id'
    ];
    protected $casts = [
        'name'=>'string',
        'email'=>'string',
        'user_type'=>'string',
        'status'=>'integer',
        'admin_role_id'=>'integer',
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
    public function role(): BelongsTo
    {
        return $this->belongsTo(AdminRole::class,'admin_role_id');
    }

}
