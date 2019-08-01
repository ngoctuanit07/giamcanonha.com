<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'        => "Giảm cân ở nhà", // set false to total remove
            'description'  => 'Giảm cân tại nhà là website chuyên cung cấp các  sản phẩm làm đẹp và chăm sóc sức khoẻ cho tất cả mọi người, mẹ và bé', // set false to total remove
            'separator'    => ' - ',
            'keywords'     => [],
            'canonical'    => false, // Set null for using Url::current(), set false to total remove
            'robots'       => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => null,
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null,
        ],
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'Giảm cân ở nhà', // set false to total remove
            'description' => '', // set false to total remove
            'url'         => 'https://www.giamcanonha.com/', // Set null for using Url::current(), set false to total remove
			'type'        => 'article',
            'site_name'   => 'Giảm cân ở nhà',
            'images'      => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          //'card'        => 'summary',
          //'site'        => '@LuizVinicius73',
        ],
    ],
];
