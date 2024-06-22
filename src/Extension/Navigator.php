<?php

namespace Admin\Extend\AdminCustomPage\Extension;

use Admin\Core\NavigatorExtensionProvider;
use Admin\Extend\AdminCustomPage\Controllers\PagesController;
use Admin\Interfaces\ActionWorkExtensionInterface;

/**
 * Class Navigator
 * @package Admin\Extend\AdminCustomPage\Extension
 */
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $appPagesController = "App\\Admin\\Controllers\\PagesController";
        $this->item('admin-custom-page.pages')
            ->resource('pages', class_exists($appPagesController) ? $appPagesController : PagesController::class)
            ->icon('fa fa-file-text-o');
    }
}
