<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\BlogCategorys;
use App\Models\BlogPosts;


class BlogsController extends AdminController {
  protected $title = 'ブログ';

  protected function grid() {
    $grid = new Grid(new BlogPosts);
    $grid->id('ID');
    $grid->title('タイトル');
    $grid->created_at('作成日時');
    $grid->updated_at('更新日時');
    return $grid;
  }

  protected function detail($id) {
    $show = new Show(BlogPosts::findOrFail($id));
    $show->field('id', __('ID'));
    $show->field('title', __('タイトル'));
    $show->field('body', __('本文'));
    $show->category_id('カテゴリー')->as(function ($id) {
      return BlogCategorys::where('category_id', '=', $id)->get()[0]['category_name'];
    });
    $show->field('main_image', __('メイン画像'));
    $show->field('created_at', __('作成日時'));
    $show->field('updated_at', __('更新日時'));
    return $show;
  }

  protected function form() {
    $category_items = array();
    foreach(BlogCategorys::get() as $key => $value) {
      $category_items[$value['category_id']] = $value['category_name'];
    }
    $form = new Form(new BlogPosts);
    $form->text('id', __('ID'))->readonly();
    $form->text('title', __('タイトル'));
    $form->textarea('body', __('本文'))->rows(10);
    $form->select('category_id', __('カテゴリー'))->options($category_items);
    $form->image('main_image', 'メイン画像')->uniqueName();
    $form->text('created_at', __('作成日時'))->readonly();
    $form->text('updated_at', __('更新日時'))->readonly();
    return $form;
  }
}
