<?php
namespace Nia34\Lambda;

require 'vendor/autoload.php';

use Lambda\NIACadroLambdaFunction;

$config = [
'profile' => 'default',
'region' => 'us-gov-west-1',
'version' => 'latest',
'aws_credentials_path' => realpath(__DIR__ . '/../credentials.ini')
];

$functionName = "arn:aws-us-gov:lambda:us-gov-west-1:129718225758:function:cadroInferenceAPI";

$datasetFilePath = realpath(__DIR__ . "/../samples/payload/Dataset_NIA.json");
if (isset($argv[1])) {
    $datasetFilePath = realpath($argv[1]);
}
$json = file_get_contents($datasetFilePath);

echo "Invoking Lambda Function Using:\n";
echo "- config: ".json_encode($config)."\n";
echo "- function name: ".$functionName."\n";
echo "- payload: ".$datasetFilePath."\n";

$runner = new NIACadroLambdaFunction($config);
$result = $runner->run($functionName, $json);
echo "Result: " . json_encode(json_decode($result), JSON_PRETTY_PRINT);
