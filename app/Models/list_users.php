<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Builder;
use App\Models\management;
use Clockwork\Request\Request;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;


class list_users extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'nama', 'description', 'about', 'umur', 'married', 'management_id', 'user_id'];
    protected $table = 'list_users';
    // protected static function newFactory()
    // {
    //     return FactoriesListUsersFactory::new();
    // }
    public static function alls()
    {
        return parent::all(); // Mengambil semua data dari tabel 'posts'
    }

    public static function findSlug($slug)
    {
        return static::where('slug', $slug)->first(); // Mencari entri dengan slug yang diberikan
    }

    public function find_management(): BelongsTo
    {
        return $this->belongsTo(management::class, 'management_id', 'id');
    }

    public function scopeFilter($query)
    {
        if (request("search")) {
            return $query->where('nama', 'like', '%' . request("search") . '%')->orWhere('description', 'like', '%' . request("search") . '%')->paginate(3)->withQueryString();
        }
        if (request("slug")) {
            return $query->where('slug', request("slug"))->first();
        }
        return $query->paginate(3);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($listUser) {
            // Hapus relasi User jika ada
            if ($listUser->user) {
                $listUser->user->delete();
            }
        });
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
