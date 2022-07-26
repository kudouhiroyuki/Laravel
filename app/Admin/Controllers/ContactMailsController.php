<?php

namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\ContactMails;


class ContactMailsController extends AdminController {
  protected $title = 'お問い合わせ（メール）';

  protected function grid() {
    $grid = new Grid(new ContactMails);
    $grid->id('ID');
    $grid->name('Name');
    $grid->email('Email');
    $grid->tel('Tel');
    $grid->created_at('作成日時');
    return $grid;
  }

  protected function detail($id) {
    $show = new Show(ContactMails::findOrFail($id));
    $show->field('id', __('ID'));
    $show->field('name', __('名前'));
    $show->field('email', __('メールアドレス'));
    $show->field('tel', __('電話番号'));
    $show->field('gender', __('性別'));
    $show->field('contents', __('お問い合わせ内容'));
    $show->field('created_at', __('作成日時'));
    return $show;
  }

  protected function form() {
    $form = new Form(new ContactMails);
    $form->text('id', __('ID'))->readonly();
    $form->text('name', __('名前'))->readonly();
    $form->text('email', __('メールアドレス'))->readonly();
    $form->text('tel', __('電話番号'))->readonly();
    $form->text('gender', __('性別'))->readonly();
    $form->text('contents', __('お問い合わせ内容'))->readonly();
    $form->text('created_at', __('作成日時'))->readonly();
    return $form;
  }
}
