<?php


namespace App\Models\Slug;


use App\Models\Post;
use Illuminate\Support\Str;

class MakeSlugProvider
{

    /**
     * Create a slug from title
     * @param  string $title
     * @return string $slug
     */
    public function createSlug(string $title): string
    {

        $slugsFound = $this->getSlugs($title);
        $counter = 0;
        $counter += $slugsFound;

        $slug = Str::slug($title, $separator = "-", app()->getLocale());

        if ($counter) {
            $slug = $slug . '-' . $counter;
        }
        return $slug;
    }

    /**
     * Find same listing with same title
     * @param string $title
     * @return int $total
     */
    protected function getSlugs(string $title): int
    {
        return Post::select()->where('slug', 'like', $title)->count();
    }

}
