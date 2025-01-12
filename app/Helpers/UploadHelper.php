<?php
use App\Helpers\FileHelper;
use Symfony\Component\HttpFoundation\File\UploadedFile;

if (!function_exists('save_image')) {
    /**
     * Save the uploaded image.
     *
     * @param UploadedFile $file     Uploaded file.
     * @param int          $maxWidth
     * @param string       $path
     * @param Closure      $callback Custom file naming method.
     *
     * @return string File name.
     */
    function save_image(UploadedFile $file, $maxWidth = 2000, $path = null, Closure $callback = null)
    {
        return FileHelper::saveImage($file, $maxWidth, $path, $callback);
    }
}

if (!function_exists('save_base64image')) {
    /**
     * Save the uploaded image.
     *
     * @param UploadedFile $file     Uploaded file.
     * @param int          $maxWidth
     * @param string       $path
     * @param Closure      $callback Custom file naming method.
     *
     * @return string File name.
     */
    function save_base64image( $file, $maxWidth = 2000, $file_name =null,$path = null)
    {
        return FileHelper::saveBase64Image($file, $maxWidth,$file_name, $path);
    }
}

if (! function_exists('upload_path')) {
    /**
     * Get the path to the upload folder.
     *
     * @param  string  $path
     * @return string
     */
    function upload_path($path = '')
    {
        return FileHelper::upload_path().($path ? DIRECTORY_SEPARATOR.ltrim($path, DIRECTORY_SEPARATOR) : $path);
    }
}
