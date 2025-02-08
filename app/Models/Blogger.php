<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogger extends User
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'person_id',
        'email',
        'role',
        'password',
    ];

    public function faq()
    {
        return $this->hasMany(Faq::class, 'user_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'blog_id');
    }

}
