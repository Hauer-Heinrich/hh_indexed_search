<?php
declare(strict_types=1);

return [
    'frontend' => [
        'hauerheinrich/frontend/hh-indexed-search' => [
            'target' => \HauerHeinrich\HhIndexedSearch\Middleware\CallIndexerMiddleware::class,
            'description' => '',
            'after' => [
                'typo3/cms-frontend/tsfe',
            ],
        ]
    ]
];
