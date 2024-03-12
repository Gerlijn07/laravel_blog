<?php 

namespace App\Models;

class Post
{

    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        // of all the blog posts, find the one with a slug that mathces the one that was requested
        return static::all()->firstWhere('slug', $slug);
    }
}