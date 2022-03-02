<?php

use App\Models\PullRequest;

return [
    'pull_request' => [
        'type' => 'state_machine',
        'supports' => [PullRequest::class],
        'places' => ['start', 'travis', 'review', 'coding', 'merged', 'closed'],
        'transitions' => [
            'submit' => [
                'from' => 'start',
                'to' => 'travis',
            ],
            'wait_for_review' => [
                'from' => 'travis',
                'to' => 'review',
            ],
            'change' => [
                'from' => 'review',
                'to' => 'coding',
            ],
            'accept' => [
                'from' => 'review',
                'to' => 'merged',
            ],
            'reject' => [
                'from' => 'review',
                'to' => 'closed',
            ],
            'reopen' => [
                'from' => 'closed',
                'to' => 'review',
            ],
            'update' => [
                'from' => ['review', 'coding', 'travis'],
                'to' => 'travis',
            ],
        ],
    ],
];
