<?php

namespace Admin\Extend\AdminCustomPage;

use Admin\ExtendProvider;
use Admin\Core\ConfigExtensionProvider;
use Admin\Extend\AdminCustomPage\Extension\Config;
use Admin\Extend\AdminCustomPage\Extension\Install;
use Admin\Extend\AdminCustomPage\Extension\Navigator;
use Admin\Extend\AdminCustomPage\Extension\Uninstall;
use Admin\Extend\AdminCustomPage\Extension\Permissions;
use Exception;

/**
 * Class ServiceProvider
 * @package Admin\Extend\AdminCustomPage
 */
class ServiceProvider extends ExtendProvider
{
    /**
     * Extension ID name
     * @var string
     */
    public static string $name = "bfg/admin-custom-page";

    /**
     * Extension call slug
     * @var string
     */
    static string $slug = "bfg_admin_custom_page";

    /**
     * Extension description
     * @var string
     */
    public static string $description = "Admin controls for custom pages";

    /**
     * @var string
     */
    protected string $navigator = Navigator::class;

    /**
     * @var string
     */
    protected string $install = Install::class;

    /**
     * @var string
     */
    protected string $uninstall = Uninstall::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected string|ConfigExtensionProvider $config = Config::class;

    /**
     * @return void
     * @throws Exception
     */
    public function boot(): void
    {
        parent::boot();

        $this->loadMigrationsFrom(__DIR__ . '/../migrations');

        /**
         * Register publishers lang.
         */
        $this->publishes([
            __DIR__.'/../translations/en' => lang_path('en'),
            __DIR__.'/../translations/ru' => lang_path('ru'),
            __DIR__.'/../translations/ua' => lang_path('ua'),
        ], ['admin-custom-page-lang']);
    }
}

