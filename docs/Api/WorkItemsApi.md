# Autodesk\Forge\Client\WorkItemsApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createWorkItem**](WorkItemsApi.md#createWorkItem) | **POST** /autocad.io/us-east/v2/WorkItems | Creates a new WorkItem.
[**deleteWorkItem**](WorkItemsApi.md#deleteWorkItem) | **DELETE** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Removes a specific WorkItem.
[**getAllWorkItems**](WorkItemsApi.md#getAllWorkItems) | **GET** /autocad.io/us-east/v2/WorkItems | Returns the details of all WorkItems.
[**getWorkItem**](WorkItemsApi.md#getWorkItem) | **GET** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Returns the details of a specific WorkItem.


# **createWorkItem**
> \Autodesk\Forge\Client\Model\WorkItemResp createWorkItem($work_item)

Creates a new WorkItem.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\WorkItemsApi($authObject);
$work_item = new \Autodesk\Forge\Client\Model\WorkItem(); // \Autodesk\Forge\Client\Model\WorkItem | 

try {
    $result = $apiInstance->createWorkItem($work_item);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling WorkItemsApi->createWorkItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **work_item** | [**\Autodesk\Forge\Client\Model\WorkItem**](../Model/\Autodesk\Forge\Client\Model\WorkItem.md)|  |

### Return type

[**\Autodesk\Forge\Client\Model\WorkItemResp**](../Model/WorkItemResp.md)

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

$apiInstance = new Autodesk\Forge\Client\Api\WorkItemsApi($authObject);
$id = "id_example"; // string | 

try {
    $apiInstance->deleteWorkItem($id);
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
> \Autodesk\Forge\Client\Model\DesignAutomationWorkItems getAllWorkItems($skip)

Returns the details of all WorkItems.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\WorkItemsApi($authObject);
$skip = 56; // int | 

try {
    $result = $apiInstance->getAllWorkItems($skip);
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

[**\Autodesk\Forge\Client\Model\DesignAutomationWorkItems**](../Model/DesignAutomationWorkItems.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getWorkItem**
> \Autodesk\Forge\Client\Model\WorkItemResp getWorkItem($id)

Returns the details of a specific WorkItem.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\WorkItemsApi($authObject);
$id = "id_example"; // string | 

try {
    $result = $apiInstance->getWorkItem($id);
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

[**\Autodesk\Forge\Client\Model\WorkItemResp**](../Model/WorkItemResp.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

