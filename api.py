import requests
url = "https://example.com/api/v2/db/_table/contact_info?limit=5"

headers = {
        "cache-control": "no-cache",
        "x-dreamfactory-api-key": "YOUR_API_KEY"
}

response = requests.request("GET", url, headers=headers)

print(response.text)
