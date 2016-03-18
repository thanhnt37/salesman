<?php namespace App\Services;

class ImageService
{

    /**
     * @param  string      $src    file path
     * @param  string      $dst    file path
     * @param  string|null $format file format
     * @param  array       $size   [ width, height ]
     * @return array
     */
    public function convert($src, $dst, $format, $size)
    {
        $image = new \Imagick($src);
        $image = $this->fixImageOrientation($image);
        $image = $this->setImageSize($image, $size);
        if (!empty($format)) {
            $image = $this->setImageFormat($image, $format);
        }
        $image->writeImage($dst);

        return [
            'height' => $image->getImageHeight(),
            'width'  => $image->getImageWidth(),
        ];
    }

    /**
     * @ref http://www.b-prep.com/blog/?p=1764
     *
     * @param  \Imagick $image
     * @return \Imagick
     */
    private function fixImageOrientation($image)
    {

        $orientation = $image->getImageOrientation();
        switch ($orientation) {
            case \Imagick::ORIENTATION_UNDEFINED:
                break;
            case \Imagick::ORIENTATION_TOPLEFT:
                break;
            case \Imagick::ORIENTATION_TOPRIGHT:
                $image->flopImage();
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateImage(new \ImagickPixel(), 180);
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_BOTTOMLEFT:
                $image->rotateImage(new \ImagickPixel(), 180);
                $image->flopImage();
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_LEFTTOP:
                $image->rotateImage(new \ImagickPixel(), 90);
                $image->flopImage();
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_RIGHTTOP:
                $image->rotateImage(new \ImagickPixel(), 90);
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_RIGHTBOTTOM:
                $image->rotateImage(new \ImagickPixel(), 270);
                $image->flopImage();
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
            case \Imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateImage(new \ImagickPixel(), 270);
                $image->setimageorientation(\Imagick::ORIENTATION_TOPLEFT);
                break;
        }

        return $image;
    }

    /**
     * @param  \Imagick $image
     * @param  string   $format
     * @return \Imagick
     */
    private function setImageFormat($image, $format)
    {
        if ($image->getImageFormat() !== $format) {
            $image->setImageFormat($format);
        }
        if ($format == 'jpeg') {
            $image->setImageCompressionQuality(90);
        }

        return $image;
    }

    /**
     * @param  \Imagick $image
     * @param  array    $size
     * @return \Imagick
     */
    private function setImageSize($image, $size)
    {
        if (!empty($size) && $image->getImageWidth() > $size[0]) {
            if ($size[1] > 0) {
                $image->cropThumbnailImage($size[0], $size[1]);
            } else {
                $image->scaleImage($size[0], $size[1]);
            }
        }

        return $image;
    }

}
