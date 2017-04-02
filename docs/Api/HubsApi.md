# Autodesk\Forge\Client\HubsApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getHub**](HubsApi.md#getHub) | **GET** /project/v1/hubs/{hub_id} | 
[**getHubs**](HubsApi.md#getHubs) | **GET** /project/v1/hubs | 


# **getHub**
> \Autodesk\Forge\Client\Model\Hub getHub($hub_id)



Returns data on a specific `hub_id`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\HubsApi($authObject);
$hub_id = "hub_id_example"; // string | the `hub id` for the current operation

try {
    $result = $apiInstance->getHub($hub_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HubsApi->getHub: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **hub_id** | **string**| the &#x60;hub id&#x60; for the current operation |

### Return type

[**\Autodesk\Forge\Client\Model\Hub**](../Model/Hub.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getHubs**
> \Autodesk\Forge\Client\Model\Hubs getHubs($filter_id, $filter_extension_type)



Returns a collection of accessible hubs for this member. A Hub represents an A360 Team/Personal hub or a BIM 360 account.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\HubsApi($authObject);
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $apiInstance->getHubs($filter_id, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling HubsApi->getHubs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Hubs**](../Model/Hubs.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

