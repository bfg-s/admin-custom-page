<?php

namespace Admin\Extend\AdminCustomPage\Extension;

use Admin\Core\InstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;
use Illuminate\Support\Facades\Schema;

/**
 * Class Install
 * @package Admin\Extend\AdminCustomPage\Extension
 */
class Install extends InstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        $this->command->call('vendor:publish', [
            '--tag' => "admin-custom-page-lang",
            '--force' => true,
        ]);

        if (! Schema::hasTable('pages')) {

            $this->command->call('migrate', [
                '--path' => "vendor/bfg/admin-custom-page/migrations",
            ]);
        }
    }
}
