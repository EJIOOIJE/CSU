<?php

namespace App\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileManagerServiceInterface
{
    /**
     * @param UploadedFile $file
     * @param string $dir
     * @return string
     */
    public function uploadFile(UploadedFile $file, string $dir): string;

    /**
     * @param string $fileName
     * @param string $dir
     * @return mixed
     */
    public function removeFile(string $fileName, string $dir);
}