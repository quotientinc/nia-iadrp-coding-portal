<?php

namespace Lambda;

use Aws\Credentials\CredentialProvider;
use Aws\Exception\AwsException;
use Aws\Lambda\Exception\LambdaException;

class NIACadroLambdaFunction
{

    protected $profile = 'default';
    protected $lambdaService;

    public function __construct($config)
    {
        $provider = CredentialProvider::ini($config['profile'], $config['aws_credentials_path']);
        // Cache the results in a memoize function to avoid loading and parsing
        // the ini file on every API operation
        $provider = CredentialProvider::memoize($provider);

        $clientArgs = [
            'region' => $config['region'],
            'version' => $config['version'],
            //'profile' => $profile, // dont use this with CredentialProvider::ini above
            'credentials' => $provider
        ];

        $this->lambdaService = new LambdaService($clientArgs);
    }

    public function run($functionName, $json = null)
    {

        try {

            $response = $this->lambdaService->invoke($functionName, $json);

            return json_decode($response['Payload']->getContents())->body;

        } catch (LambdaException $e) {
            // Catch Lambda specific exception.
            echo $e->getMessage();

            var_dump($e->toArray());
        } catch (AwsException $e) {
            // This catches the more generic AwsException. You can grab information
            // from the exception using methods of the exception object.
            echo $e->getAwsRequestId() . "\n";
            echo $e->getAwsErrorType() . "\n";
            echo $e->getAwsErrorCode() . "\n";

            var_dump($e->toArray());
        }
    }
}