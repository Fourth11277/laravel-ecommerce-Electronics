<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    /**
     * Allow safe mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    /**
     * Basic validation guidance (optional helper).
     *
     * @var array<string, string>
     */
    protected array $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getExcerpt(int $limit = 100): string
    {
        return Str::limit($this->content ?? '', $limit);
    }
}


