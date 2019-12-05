<?php

namespace BristolSU\Playground\Tests\Helpers;

use BristolSU\Playground\Tests\TestCase;

class helpersTest extends TestCase
{

    /** @test */
    public function it_renders_the_correct_url_from_config(){
        $this->app['config']->set('filesystems.static_content.url', 'amazons3.com');
        $this->app['config']->set('filesystems.static_content.bucket', 'bucket-name');
        $this->app['config']->set('filesystems.static_content.folder', 'folder-name');
        $this->assertEquals('https://amazons3.com/bucket-name/folder-name/file.png', serveStatic('file.png'));
    }

}
