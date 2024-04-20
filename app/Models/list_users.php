<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\management;


class list_users extends Model
{
    use HasFactory;
    protected $fillable = ['slug', 'nama', 'description', 'about', 'umur', 'married', 'management_id', 'user_id'];
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
}
