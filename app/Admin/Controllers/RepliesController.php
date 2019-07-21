<?php

namespace App\Admin\Controllers;

use App\Models\Post;
use App\Models\Reply;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RepliesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '评论列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Reply);

        $grid->column('id', __('Id'));
        $grid->column('name', __('用户名'));
        $grid->column('email', __('Email'));
        $grid->column('content', __('评论内容'))->style('max-width:280px;word-break:break-all;');;
        $grid->column('post_id', __('所属文章'))->display(function ($post_id){
            return Post::find($post_id)->title;
        });
        $grid->column('created_at', __('创建于'))->sortable();


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Reply::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('content', __('Content'));
        $show->field('post_id', __('Post id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Reply);

        $form->text('name', __('Name'));
        $form->email('email', __('Email'));
        $form->text('content', __('Content'));
        $form->number('post_id', __('Post id'));

        return $form;
    }
}
