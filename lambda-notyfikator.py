import boto3
import os
from boto3.dynamodb.conditions import Key, Attr
import json
import time

dynamodb = boto3.resource('dynamodb')
sns = boto3.client("sns")
ec2 = boto3.client("ec2")


def lambda_handler(event, context):


    time.sleep(60)

    instanceId = event["detail"]["instance-id"]

    table = dynamodb.Table("serwery")
    items = table.query(KeyConditionExpression=Key('instanceId').eq(instanceId))
    name = items['Items'][0]['name'].upper()
    phoneNumber = items['Items'][0]['phoneNumber']

    ec2.modify_instance_metadata_options(
        InstanceId=instanceId,
        InstanceMetadataTags='enabled'
        )

    endpoint = ec2.describe_instances(InstanceIds=[instanceId])["Reservations"][0]["Instances"][0]["PublicIpAddress"]

    response = "Twój serwer o nazwie " + name + " został utworzony. Jego adres to: http://" + endpoint;

    sns.publish( PhoneNumber=phoneNumber, Message = response, MessageAttributes={'AWS.SNS.SMS.SenderID': {'DataType': 'String', 'StringValue': "CHMURA"}, 'AWS.SNS.SMS.SMSType': {'DataType': 'String', 'StringValue': 'Promotional'}} );

    return "OK"
