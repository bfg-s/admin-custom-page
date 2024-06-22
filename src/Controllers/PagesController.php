<?php

namespace Admin\Extend\AdminCustomPage\Controllers;

use Admin\Delegates\Tab;
use Admin\Page;
use Admin\Controllers\Controller;
use Admin\Delegates\Card;
use Admin\Delegates\Form;
use Admin\Delegates\SearchForm;
use Admin\Delegates\ModelTable;
use Admin\Delegates\ModelInfoTable;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * CityController Class
 * @package App\Admin\Controllers
 */
class PagesController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = \Admin\Extend\AdminCustomPage\Models\Page::class;

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @return Page
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(Page $page, Card $card, SearchForm $searchForm, ModelTable $modelTable) : Page
    {
        return $page->card(
            $card->search_form(
                $searchForm->id(),
                $searchForm->input('name', 'admin-custom-page.name'),
                $searchForm->input('content', 'admin-custom-page.content'),
                $searchForm->at(),
            ),
            $card->model_table(
                $modelTable->id()->to_export(),
                $modelTable->col('admin-custom-page.name', 'name')->sort->to_export(),
                $modelTable->col('admin-custom-page.views', 'views')->sort->badge->to_export(),
                $modelTable->at(),
            ),
        );
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  Form  $form
     * @param  Tab  $tab
     * @return Page
     */
    public function matrix(Page $page, Card $card, Form $form, Tab $tab) : Page
    {
        return $page->card(
            $card->form(
                $form->tabGeneral(
                    $tab->lang()
                        ->input('name', 'admin-custom-page.name')
                        ->required()
                        ->duplication_how_slug('#input_seo_slug')
                        ->duplication('#input_seo_title')
                        ->vertical(),
                    $tab->lang()
                        ->ckeditor('content', 'admin-custom-page.content')
                        ->vertical(),
                    $tab->numeric('views', 'admin-custom-page.views')
                        ->default(0),
                ),
                $form->tabSeo()
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param Page $page
     * @param Card $card
     * @param ModelInfoTable $modelInfoTable
     * @return Page
     */
    public function show(Page $page, Card $card, ModelInfoTable $modelInfoTable) : Page
    {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->rowDefault(
                    $modelInfoTable->row('admin-custom-page.name', 'name'),
                    $modelInfoTable->row('admin-custom-page.content', 'content'),
                    $modelInfoTable->row('admin-custom-page.views', 'views')->badge,
                )
            ),
        );
    }
}
