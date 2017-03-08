# AutodeskForge\Client\EnginesApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getAllEngines**](EnginesApi.md#getAllEngines) | **GET** /autocad.io/us-east/v2/Engines | Returns the details of all available AutoCAD core engines.
[**getEngine**](EnginesApi.md#getEngine) | **GET** /autocad.io/us-east/v2/Engines(&#39;{id}&#39;) | Returns the details of a specific AutoCAD core engine.


# **getAllEngines**
> \AutodeskForge\Client\Model\DesignAutomationEngines getAllEngines()

Returns the details of all available AutoCAD core engines.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new AutodeskForge\Client\Api\EnginesApi($authObject);

try {
    $result = $apiInstance->getAllEngines();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnginesApi->getAllEngines: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\AutodeskForge\Client\Model\DesignAutomationEngines**](../Model/DesignAutomationEngines.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getEngine**
> \AutodeskForge\Client\Model\Engine getEngine($id)

Returns the details of a specific AutoCAD core engine.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new AutodeskForge\Client\Api\EnginesApi($authObject);
$id = "id_example"; // string | 

try {
    $result = $apiInstance->getEngine($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling EnginesApi->getEngine: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\AutodeskForge\Client\Model\Engine**](../Model/Engine.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

