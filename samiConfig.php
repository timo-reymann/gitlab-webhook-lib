<?php

use Sami\Sami;
use Sami\RemoteRepository\GitHubRemoteRepository;


return new Sami("src", [
    'title'                => 'Gitlab Webhook Library',
    'build_dir'            => __DIR__.'/docs',
    'cache_dir'            => __DIR__.'/docs_cache',
    'default_opened_level' => 2,
]);