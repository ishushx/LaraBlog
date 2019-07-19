<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Post;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PostController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Post);

        $grid->column('id', __('Id'))->sortable();
        $grid->column('title', __('标题'))->width(300);
        $grid->column('content', __('内容'))->display(function ($content){
            return \Str::limit($content,'100');
        })->width(300);
        $grid->column('category_id', __('所属分类'))->display(function ($category_id){
            return Category::find($category_id)->name;
        });
        $grid->column('view_count', __('查看数量'));
        $grid->column('created_at', __('发表于'))->sortable();

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
        $show = new Show(Post::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('标题'));
        $show->field('content', __('内容'));
        $show->field('category_id', __('所属分类'))->as(function ($category_id){
            return Category::find($category_id)->name;
        });
        $show->field('view_count', __('查看数量'));
        $show->field('reply_count', __('回复数量'));
        $show->field('slug', __('Slug'));
        $show->field('excerpt', __('摘要'));
        $show->field('created_at', __('发表于'));
        $show->field('updated_at', __('更新于'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Post);

        $form->text('title', __('标题'))->rules('required|min:3');
        $form->number('category_id', __('分类'));
        $form->simditor('content', __('内容'));

        return $form;
    }
}
