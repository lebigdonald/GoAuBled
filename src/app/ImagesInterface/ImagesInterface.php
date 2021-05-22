<?php

declare(strict_types=1);

namespace App\ImagesInterface;

use App\Models\ImageUpload;
use Illuminate\Http\UploadedFile;

interface ImagesInterface
{
    function initDirectory();

    function createImage(UploadedFile $image, $basename);

    function deleteImage(ImageUpload $image);
}
