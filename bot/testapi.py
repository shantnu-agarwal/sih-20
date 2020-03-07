import os, requests, uuid, json

# subscription_key = '7d84d0e59c734c3b821df52318eb578a'
endpoint_var_name = 'https://kisaantext.cognitiveservices.azure.com/sts/v1.0/issuetoken?Subscription-Key=7d84d0e59c734c3b821df52318eb578a'


# path = '/translate?api-version=3.0'
# params = '&to=de&to=it'
# constructed_url = endpoint_var_name + path + params

# headers = {
#     'Ocp-Apim-Subscription-Key': subscription_key,
#     'Content-type': 'application/json',
#     'X-ClientTraceId': str(uuid.uuid4())
# }

# You can pass more than one object in body.
body = [{
    'text' : 'Hello World!'
}]
# request = requests.post(constructed_url, headers=headers, json=body)
request = requests.post(endpoint_var_name,json=body)
print(str(request))
response = request.json()

print(json.dumps(response, sort_keys=True, indent=4, separators=(',', ': ')))