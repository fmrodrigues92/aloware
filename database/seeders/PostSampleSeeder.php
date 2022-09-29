<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSampleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'slug' => 'post-sample',
                'title' => 'Card title',
                'subtitle' => 'Some quick example text to build on the card title and make up the bulk of the card\'s content.',
                'content' => '<p>Lorem ipsum dolor <strong>sit amet</strong>, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Magna fermentum iaculis eu non diam phasellus. Risus nullam eget felis eget. Ante metus dictum at tempor. Urna condimentum mattis pellentesque id nibh tortor. Sit amet est placerat in egestas erat imperdiet sed euismod. Tellus integer feugiat scelerisque varius morbi enim. Massa sapien faucibus et molestie. Sollicitudin aliquam ultrices sagittis orci a scelerisque purus semper eget. Ipsum dolor sit amet consectetur adipiscing elit ut aliquam. Lacinia at quis risus sed vulputate odio ut. Sed elementum tempus egestas sed. Ac feugiat sed lectus vestibulum mattis.</p><p>Arcu ac tortor dignissim convallis aenean et tortor at. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec. Tincidunt eget nullam non nisi est. Orci ac auctor augue mauris augue neque gravida in. Porta nibh venenatis cras sed felis eget velit aliquet. In nulla posuere sollicitudin aliquam ultrices sagittis orci a scelerisque. Consequat semper viverra nam libero justo laoreet. Sed viverra ipsum nunc aliquet bibendum. Malesuada pellentesque elit eget gravida. Vulputate enim nulla aliquet porttitor lacus.</p>',
                'image_background' => 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.cameraegg.org%2Fwp-content%2Fuploads%2F2015%2F02%2FCanon-EOS-M3-Sample-Images-4.jpg&f=1&nofb=1&ipt=60c83c0acca1cd086f725ee75d75d62e2ac511f171b9c81c9afe87d55895f258&ipo=images',
            ]
        ];

        foreach($data as $item){
            Post::firstOrCreate([
                'slug' => $item['slug']
            ], $item);
        }
    }
}
