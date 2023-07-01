<?php

namespace Lambda;

use Aws\Lambda\LambdaClient;
use Aws\Result;

class LambdaService {
    protected LambdaClient $lambdaClient;

    public function __construct($clientArgs = null) {

        if (is_null($clientArgs)) {
            $clientArgs = [
                'region' => 'us-gov-west-1',
                'version' => 'latest',
                'profile' => 'default'
            ];
        }

        $this->lambdaClient = new LambdaClient($clientArgs);
    }

    public function invoke($functionName, $payload)
    {
        return $this->lambdaClient->invoke([
            'FunctionName' => $functionName,
            'Payload' => $payload
        ]);
    }
}