<?php

declare(strict_types=1);

class FileSearcher
{
    /**
     * @var RecursiveIteratorIterator
     */
    private $recursiveDirectoryIteratorIterator;

    /**
     * @param string $path
     */
    public function __construct(string $path)
    {
        if (!file_exists($path) || !is_readable($path) || !is_dir($path)) {
            throw new InvalidArgumentException(sprintf('Could not access directory = %s', $path));
        }
        $recursiveDirectoryIterator = new RecursiveDirectoryIterator($path);
        $this->recursiveDirectoryIteratorIterator = new RecursiveIteratorIterator($recursiveDirectoryIterator);
    }

    /**
     * @param string $regex
     * @return array
     */
    public function findByRegex(string $regex): array
    {
        $iterator = new RegexIterator($this->recursiveDirectoryIteratorIterator, $regex);
        $files = [];
        /** @var SplFileObject $file */
        foreach ($iterator as $file) {
            $files[] = $file->getFilename();
        }
        return $files;
    }
}