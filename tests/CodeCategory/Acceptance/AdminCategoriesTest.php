<?php

namespace CodePress\CodeCategory\Testing;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use CodePress\CodeCategory\Models\Category;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminCategoriesTest extends \TestCase
{
    use DatabaseTransactions;

    public function test_visit_admin()
    {
        $this->visit('/admin/categories')
            ->see('Categories');

    }

    public function test_categories_listing()
    {
        Category::create(['name' => 'Category 1', 'active' => true]);
        Category::create(['name' => 'Category 2', 'active' => true]);
        Category::create(['name' => 'Category 3', 'active' => true]);
        Category::create(['name' => 'Category 4', 'active' => true]);

        $this->visit('/admin/categories')
            ->see('Category 1')
            ->see('Category 2')
            ->see('Category 3')
            ->see('Category 4');
    }

    public function test_click_create_new_category()
    {
        $this->visit('/admin/categories')
            ->click('Create Category')
            ->seePageIs('/admin/categories/create')
            ->see('Create Category');
    }

    public function test_create_new_category()
    {
        $this->visit('/admin/categories/create')
            ->type('Category Test', 'name')
            ->check('active')
            ->press('Save')
            ->seePageIs('admin/categories')
            ->see('Category Test');
    }

    public function test_click_edit_category()
    {
        $category = Category::create(['name' => 'Category Test', 'active' => true]);
        $link = "admin/categories/edit/{$category->id}";
        $this->visit('/admin/categories')
            ->seeLink('Edit', $link)
            ->visit($link)
            ->see("Edit Category: {$category->name}")
            ->see('Save');
    }

    public function test_edit_category()
    {
        $category = Category::create(['name' => 'Category Test', 'active' => true]);
        $id = $category->id;

        $this->visit("/admin/categories/edit/{$id}")
            ->type('Changed category', 'name')
            ->uncheck('active')
            ->press('Save')
            ->seePageIs('admin/categories')
            ->see('Changed category');
    }

    public function test_destroy_category()
    {
        $category = Category::create(['name' => 'Category Test', 'active' => true]);
        $id = $category->id;

        $this->visit("admin/categories/destroy/{$id}")
            ->seePageIs('admin/categories')
            ->dontSee('Category Test');
    }
}
