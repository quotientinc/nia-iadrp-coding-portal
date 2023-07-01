#!/bin/bash

# Invoke a Lambda Function From AWS CLI
aws lambda invoke --profile govcloud --function-name arn:aws-us-gov:lambda:us-gov-west-1:129718225758:function:cadroInferenceAPI --payload file://samples/payload/Dataset_NIA.json output_$(date +"%Y-%m-%d").json