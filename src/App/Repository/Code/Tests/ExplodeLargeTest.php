<?php
namespace App\Repository\Code\Tests;

class ExplodeLargeTest extends TestInterface
{
    public function getDescription()
    {
        return 'Split a large string with explode and get the first element';
    }

    public function run($loop)
    {
        $this->start($loop);

        for ($i = 0; $i < $this->loop; ++$i) {
            $value = explode(' ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin malesuada, nisl sit amet congue blandit, neque ipsum molestie leo, eget mattis ipsum est a purus. Pellentesque sem magna, placerat eu ante et, congue posuere nibh. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam lacinia leo eu odio auctor tempus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus et nunc tincidunt, sodales elit a, suscipit nibh. Pellentesque nibh eros, fringilla et massa eget, pulvinar rhoncus metus. Nullam eu velit libero. Praesent posuere feugiat arcu placerat porttitor. Nulla suscipit hendrerit vehicula. In in elementum est. Aenean risus nulla, gravida non rhoncus et, malesuada eget ex.');
            $value = $value[0];
        }

        return $this->end();
    }
}
