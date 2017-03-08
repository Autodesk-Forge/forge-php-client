# AutodeskForge\Client\ActivitiesApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createActivity**](ActivitiesApi.md#createActivity) | **POST** /autocad.io/us-east/v2/Activities | Creates a new Activity.
[**deleteActivity**](ActivitiesApi.md#deleteActivity) | **DELETE** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Removes a specific Activity.
[**deleteActivityHistory**](ActivitiesApi.md#deleteActivityHistory) | **POST** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.DeleteHistory | Removes the version history of the specified Activity.
[**getActivity**](ActivitiesApi.md#getActivity) | **GET** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Returns the details of a specific Activity.
[**getActivityVersions**](ActivitiesApi.md#getActivityVersions) | **GET** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.GetVersions | Returns all old versions of a specified Activity.
[**getAllActivities**](ActivitiesApi.md#getAllActivities) | **GET** /autocad.io/us-east/v2/Activities | Returns the details of all Activities.
[**patchActivity**](ActivitiesApi.md#patchActivity) | **PATCH** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Updates an Activity by specifying only the changed attributes.
[**setActivityVersion**](ActivitiesApi.md#setActivityVersion) | **POST** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.SetVersion | Sets the Activity to the specified version.


# **createActivity**
> \AutodeskForge\Client\Model\Activity createActivity($activity)

Creates a new Activity.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$activity = new \AutodeskForge\Client\Model\Activity(); // \AutodeskForge\Client\Model\Activity | 

try {
    $result = $api_instance->createActivity($activity);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->createActivity: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **activity** | [**\AutodeskForge\Client\Model\Activity**](../Model/\AutodeskForge\Client\Model\Activity.md)|  |

### Return type

[**\AutodeskForge\Client\Model\Activity**](../Model/Activity.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteActivity**
> deleteActivity($id)

Removes a specific Activity.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 

try {
    $api_instance->deleteActivity($id);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->deleteActivity: ', $e->getMessage(), PHP_EOL;
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

# **deleteActivityHistory**
> deleteActivityHistory($id)

Removes the version history of the specified Activity.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 

try {
    $api_instance->deleteActivityHistory($id);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->deleteActivityHistory: ', $e->getMessage(), PHP_EOL;
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

# **getActivity**
> \AutodeskForge\Client\Model\Activity getActivity($id)

Returns the details of a specific Activity.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 

try {
    $result = $api_instance->getActivity($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->getActivity: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\AutodeskForge\Client\Model\Activity**](../Model/Activity.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getActivityVersions**
> \AutodeskForge\Client\Model\DesignAutomationActivities getActivityVersions($id)

Returns all old versions of a specified Activity.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 

try {
    $result = $api_instance->getActivityVersions($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->getActivityVersions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\AutodeskForge\Client\Model\DesignAutomationActivities**](../Model/DesignAutomationActivities.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAllActivities**
> \AutodeskForge\Client\Model\DesignAutomationActivities getAllActivities()

Returns the details of all Activities.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();

try {
    $result = $api_instance->getAllActivities();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->getAllActivities: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\AutodeskForge\Client\Model\DesignAutomationActivities**](../Model/DesignAutomationActivities.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchActivity**
> patchActivity($id, $activity)

Updates an Activity by specifying only the changed attributes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 
$activity = new \AutodeskForge\Client\Model\ActivityOptional(); // \AutodeskForge\Client\Model\ActivityOptional | 

try {
    $api_instance->patchActivity($id, $activity);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->patchActivity: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **activity** | [**\AutodeskForge\Client\Model\ActivityOptional**](../Model/\AutodeskForge\Client\Model\ActivityOptional.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **setActivityVersion**
> setActivityVersion($id, $activity_version)

Sets the Activity to the specified version.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
AutodeskForge\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new AutodeskForge\Client\Api\ActivitiesApi();
$id = "id_example"; // string | 
$activity_version = new \AutodeskForge\Client\Model\ActivityVersion(); // \AutodeskForge\Client\Model\ActivityVersion | 

try {
    $api_instance->setActivityVersion($id, $activity_version);
} catch (Exception $e) {
    echo 'Exception when calling ActivitiesApi->setActivityVersion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **activity_version** | [**\AutodeskForge\Client\Model\ActivityVersion**](../Model/\AutodeskForge\Client\Model\ActivityVersion.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

