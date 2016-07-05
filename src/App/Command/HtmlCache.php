<?php
namespace App\Command;

use App\App\Command;
use App\Database\Model\Test;
use App\Filesystem\File;
use App\Router\Route;

class HtmlCache extends CommandInterface
{
    public function run()
    {
        $this->url = config('app')['url'];
        $this->storage = Route::getStoragePath('/cache/html');

        $tests = Test::all();

        $this->curl('/index');
        $this->curl('/index/about');

        foreach ($tests as $test1) {
            $this->curl('/test/detail/'.$test1->name);

            foreach ($tests as $test2) {
                $this->curl('/test/compare/'.$test1->name.'/'.$test2->name);
            }
        }
    }

    private function curl($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->url.$url.'?cache=false');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        File::write($this->storage.$url.'.html', curl_exec($curl));
    }
}
