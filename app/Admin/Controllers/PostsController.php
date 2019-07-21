<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Table;

class PostsController extends AdminController
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
        $grid->model()->orderBy('created_at', 'desc');

        $grid->column('title', '标题')->expand(function ($model) {

            $replies = $model->replies()->take(10)->get()->map(function ($reply) {
                return $reply->only(['id', 'content', 'created_at']);
            });

            return new Table(['ID', '评论内容', '发布时间'], $replies->toArray());
        })->width(230);

        $grid->column('excerpt', __('内容'))->width(300);

        $grid->column('category_id', __('所属分类'))->display(function ($category_id){
            return Category::find($category_id)->name;
        });
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
        $show->field('category_id', __('所属分类'))->as(function ($category_id) {
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

        $form->text('title', __('标题:'))->rules('required|min:3');

        $categories = Category::all()->pluck('name')->toArray();
        $form->select('category_id', __('分类:'))->options($categories);

        $form->multipleSelect('tags', '标签')->options(Tag::all()->pluck('name','id'));

        $form->simditor('content', __('内容:'));

        $form->saving(function (Form $form){
            if (!$form->category_id){
                $form->category_id=1;
            }
        });

        return $form;
    }
}
