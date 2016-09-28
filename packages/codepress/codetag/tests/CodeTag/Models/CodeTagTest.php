<?php

namespace CodePress\CodeTag\Models;

use CodePress\CodeTag\AbstractTestCase;

class CodeTagTest extends AbstractTestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_if_it_is_persisting_correctly()
    {
        Tag::create(['name' => 'Technology']);
        $tag = Tag::all()->first();

        $this->assertEquals('Technology', $tag->name);
    }
}