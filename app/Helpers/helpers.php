<?php

if (!function_exists('serveStatic')) {
    /**
     * Create URLs to represent static assets in an s3 bucket
     *
     * @param string $filename Name of the file to serve
     * @return string Full URL of the asset
     */
    function serveStatic($filename)
    {
        return 'https://'
            .config('filesystems.static_content.url').'/'
            .config('filesystems.static_content.bucket').'/'
            .config('filesystems.static_content.folder').'/'.$filename;
    }
}
