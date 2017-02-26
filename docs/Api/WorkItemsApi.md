# Autodesk\Client\WorkItemsApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWorkItem**](WorkItemsApi.md#createWorkItem) | **POST** /autocad.io/us-east/v2/WorkItems | Creates a new WorkItem.
[**deleteWorkItem**](WorkItemsApi.md#deleteWorkItem) | **DELETE** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Removes a specific WorkItem.
[**getAllWorkItems**](WorkItemsApi.md#getAllWorkItems) | **GET** /autocad.io/us-east/v2/WorkItems | Returns the details of all WorkItems.
[**getWorkItem**](WorkItemsApi.md#getWorkItem) | **GET** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Returns the details of a specific WorkItem.


# **createWorkItem**
> \Autodesk\Client\Model\WorkItemResp createWorkItem($work_item)

Creates a new WorkItem.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\WorkItemsApi();
$work_item = new \Autodesk\Client\Model\WorkItem(); // \Autodesk\Client\Model\WorkItem | 

try {
    $result = $api_instance->createWorkItem($work_item);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkItemsApi->createWorkItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **work_item** | [**\Autodesk\Client\Model\WorkItem**](../Model/\Autodesk\Client\Model\WorkItem.md)|  |

### Return type

[**\Autodesk\Client\Model\WorkItemResp**](../Model/WorkItemResp.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteWorkItem**
> deleteWorkItem($id)

Removes a specific WorkItem.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\WorkItemsApi();
$id = "id_example"; // string | 

try {
    $api_instance->deleteWorkItem($id);
} catch (Exception $e) {
    echo 'Exception when calling WorkItemsApi->deleteWorkItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAllWorkItems**
> \Autodesk\Client\Model\DesignAutomationWorkItems getAllWorkItems($skip)

Returns the details of all WorkItems.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\WorkItemsApi();
$skip = 56; // int | 

try {
    $result = $api_instance->getAllWorkItems($skip);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkItemsApi->getAllWorkItems: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **skip** | **int**|  | [optional]

### Return type

[**\Autodesk\Client\Model\DesignAutomationWorkItems**](../Model/DesignAutomationWorkItems.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWorkItem**
> \Autodesk\Client\Model\WorkItemResp getWorkItem($id)

Returns the details of a specific WorkItem.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\WorkItemsApi();
$id = "id_example"; // string | 

try {
    $result = $api_instance->getWorkItem($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkItemsApi->getWorkItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\Autodesk\Client\Model\WorkItemResp**](../Model/WorkItemResp.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

