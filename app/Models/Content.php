<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'image_path',
        'likes',
        'dislikes',
    ];

    static function rateContent(string $id, string $type = 'like'): void
    {
        $content = parent::find($id);

        if ($type === 'like') {
            $likesCount = $content->likes;
            $content->likes = $likesCount + 1;
        } elseif ($type === 'dislike') {
            $dislikesCount = $content->dislikes;
            $content->dislikes = $dislikesCount + 1;
        }

        $content->save();
    }
}
