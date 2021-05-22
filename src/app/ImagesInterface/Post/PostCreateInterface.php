<?php


namespace App\ImagesInterface\Post;


use App\Models\Post;
use Illuminate\Http\Request;

interface PostCreateInterface
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function validation(Request $request): array;

    /**
     * @param Request $request
     * @return Post
     */
    public function postTravel(Request $request): Post;

    /**
     * @param Request $request
     * @return Post
     */
    public function postPacket(Request $request): Post;

    /**
     * @param $email
     * @param array $images
     * @param int $postId
     * @return bool
     */
    public function saveImages($email, int $postId, array $images): bool;

    /**
     * @return bool
     */
    public function notify(): bool;

}
