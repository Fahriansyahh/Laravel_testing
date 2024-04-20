<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Models\list_users;

class management extends Model
{
    public static function alls()
    {
        return parent::all(); // Mengambil semua data dari tabel 'posts'
    }

    public function list(): HasMany
    {
        return $this->hasMany(list_users::class);
    }
    protected $fillable = ["position", 'role_position'];

    use HasFactory;
}
