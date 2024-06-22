<p align="center"><a href="https://wood.veskod.com/documentation/admin-panel" target="_blank">
<img src="https://wood.veskod.com/images/logo.png" alt="Laravel Logo">
</a></p>

<p align="center">
<a href="https://packagist.org/packages/bfg/admin-custom-page"><img src="https://img.shields.io/packagist/dt/bfg/admin-custom-page" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/bfg/admin-custom-page"><img src="https://img.shields.io/packagist/v/bfg/admin-custom-page" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/bfg/admin-custom-page"><img src="https://img.shields.io/packagist/l/bfg/admin-custom-page" alt="License"></a>
</p>

# Install
```
composer require bfg/admin-custom-page
```
# Admin install
```
php artisan admin:extension bfg/admin-custom-page --install
```
# Admin menu
In the case where you need to change the location of the "Pages" menu item in the structure of the administrative panel of your application, there is a specialized method for achieving this goal. This method, called `bfg_admin_custom_page`, allows you to flexibly integrate the "Pages" menu item into any part of your site's management interface. Using this method, you get the opportunity to customize the layout of menu elements in accordance with the administration needs and navigation logic of your web application. Thus, `bfg_admin_custom_page` provides you with tools for optimizing the workspace of the administrative panel, thereby improving its usability and efficiency of working with the Pages settings of your site:
```php
class Navigator extends NavigatorExtensionProvider implements ActionWorkExtensionInterface
{
    /**
     * @return void
     */
    public function handle() : void
    {
        $this->bfg_admin_custom_page(); // SEO menu item
        
        // OR
        
        $this->group('Pages group', 'pages_group', function (NavGroup $group) {
            $group->bfg_admin_custom_page(); // SEO menu item in group
        })->icon_thumbtack();

        $this->makeDefaults();

        $this->makeExtensions();
    }
}
```
