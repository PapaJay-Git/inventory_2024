<?php

namespace App\Helpers;

use App\Models\Garden;
use App\Models\Grave;

class ImageGeneratorHelper
{
    public static function getImageBased64($path)
    {
        if (file_exists(public_path($path))) {
            $path = public_path($path);
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($data);

            return $base64Logo;
        }

        return null;

    }
}
