# [NIA-34](https://myquotient.atlassian.net/browse/NIA-34) 

Invoke NIA CADRO AWS Lambda Function using AWS SDK for PHP

## Setup:

```bash
composer install
```

Create `credentials.ini` file. The format of the AWS credentials file should look something like the following.
```bash
[default]
aws_access_key_id = YOUR_AWS_ACCESS_KEY_ID
aws_secret_access_key = YOUR_AWS_SECRET_ACCESS_KEY
cli_binary_format = raw-in-base64-out
region = us-gov-west-1

[project1]
aws_access_key_id = ANOTHER_AWS_ACCESS_KEY_ID
aws_secret_access_key = ANOTHER_AWS_SECRET_ACCESS_KEY
cli_binary_format = raw-in-base64-out
region = us-gov-west-1
```

> **NOTE:** if you want to use another profile other than `default` you need to edit the [LambdaFunctionRunner.php](./src/LambdaFunctionRunner.php) file and change the line with `'profile' = 'default';`

If you don’t provide a credentials file, the SDK attempts to load credentials from your environment in the following order:
1. Load credentials from environment variables.
2. Load credentials from a credentials .ini file.
   1. provided path to credentials .ini file
   2. ~/.aws/credentials
   3. ~/.aws/config
3. Load credentials from an IAM role.

> see: for more info [Credentials for the AWS SDK for PHP Version 3](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html)

## Running the NIA CADRO lambda function:

```bash
php src/LambdaFunctionRunner.php ./samples/payload/Dataset_NIA.json
```

## AWS SDK for PHP Developer Guid:
[https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/welcome.html](https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/welcome.html)