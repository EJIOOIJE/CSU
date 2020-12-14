<?php

namespace App\Service;


use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileManagerService implements FileManagerServiceInterface
{

    private $uploadsDirectory;

    public function __construct($uploadsDirectory)
    {
        $this->uploadsDirectory = $uploadsDirectory;
    }

    /**
     * @return mixed
     */
    public function getUploadsDirectory()
    {
        return $this->uploadsDirectory;
    }

    public function uploadFile(UploadedFile $file, string $dir): string
    {
        $fileName = uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->uploadsDirectory . DIRECTORY_SEPARATOR . $dir, $fileName);
        } catch (FileException $exception) {
            return $exception;
        }
        
        return $fileName;
    }

    public function removeFile(string $fileName, string $dir)
    {
        $fileSystem = new Filesystem();
        $file = $this->uploadsDirectory.DIRECTORY_SEPARATOR.$dir.DIRECTORY_SEPARATOR.$fileName;
        try {
            $fileSystem->remove($file);
        } catch (IOExceptionInterface $exception) {
            $exception->getMessage();
        }
    }
}