<?php

namespace CodePress\CodeCategory\Testing;

use CodePress\CodeTag\Models\Tag;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminTagsTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_visit_index()
    {
        $this->visit('/admin/tags')
            ->see('Tags');
    }

    public function test_tags_listing()
    {
        Tag::create(['name' => 'Tag 1']);
        Tag::create(['name' => 'Tag 2']);
        Tag::create(['name' => 'Tag 3']);
        Tag::create(['name' => 'Tag 4']);

        $this->visit('admin/tags')
            ->see('Tag 1')
            ->see('Tag 2')
            ->see('Tag 3')
            ->see('Tag 4');
    }

    public function test_click_create_new_tag()
    {
        $this->visit('/admin/tags')
            ->click('Create Tag')
            ->seePageIs('/admin/tags/create')
            ->see('Create Tag');
    }

    public function test_create_new_tag()
    {
        $this->visit('/admin/tags/create')
            ->type('Tag Test', 'name')
            ->press('Save')
            ->seePageIs('/admin/tags')
            ->see('Tag Test');
    }

    public function test_click_edit_tag()
    {
        $tag = Tag::create(['name' => 'Tag Test']);
        $link = "/admin/tags/edit/{$tag->id}";

        $this->visit('/admin/tags')
            ->seeLink('Edit', $link)
            ->visit($link)
            ->see("Edit Tag: {$tag->name}")
            ->see('Save');
    }

    public function test_edit_tag()
    {
        $tag = Tag::create(['name' => 'Tag Test']);

        $this->visit("/admin/tags/edit/{$tag->id}")
            ->type('Tag Edited', 'name')
            ->press('Save')
            ->seePageIs('/admin/tags')
            ->see('Tag Edited')
            ->dontSee('Tag Test');
    }

    public function test_destroy_tag()
    {
        $tag = Tag::create(['name' => 'Tag Test']);
        $link = "/admin/tags/destroy/{$tag->id}";

        $this->visit('/admin/tags')
            ->seeLink('Delete', $link)
            ->visit($link)
            ->seePageIs('/admin/tags')
            ->dontsee('Tag Test')
            ->dontSeeLink('Delete', $link);
    }
}