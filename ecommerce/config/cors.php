<?php

return [
    'paths' => ['api/*'], // Permite CORS nas rotas da API
    'allowed_methods' => ['*'], // Permite todos os métodos (GET, POST, etc.)
    'allowed_origins' => ['*'], // Permite requisições de qualquer domínio (ajuste conforme necessário)
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'], // Permite todos os cabeçalhos
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => true,
];
