<?php

return [
    'editor' => env('OPEN_ON_MAKE_EDITOR', 'code'),
    'flags' => env('OPEN_ON_MAKE_FLAGS', '--reuse-window'),
    'enabled' => env('OPEN_ON_MAKE_ENABLED', true)
];
