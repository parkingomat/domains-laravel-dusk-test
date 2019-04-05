<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    public function testAll()
    {
        $screen = (string)__FUNCTION__;
        $this->browse(function (Browser $browser, $screen) {
            $csv = array_map('str_getcsv', file('url.csv'));

            foreach ($csv as $key => $url) {

                $filename = str_replace(['https', 'http', '/', ':', '.'], '_', $url[0]);
                $browser->visit('http://' . $url[0])
                    ->screenshot($filename);
            }

        });
    }

}
