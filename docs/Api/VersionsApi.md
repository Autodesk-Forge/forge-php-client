# Swagger\Client\VersionsApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getVersion**](VersionsApi.md#getVersion) | **GET** /data/v1/projects/{project_id}/versions/{version_id} | 
[**getVersionItem**](VersionsApi.md#getVersionItem) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/item | 
[**getVersionRefs**](VersionsApi.md#getVersionRefs) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/refs | 
[**getVersionRelationshipsRefs**](VersionsApi.md#getVersionRelationshipsRefs) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/relationships/refs | 
[**postVersionRelationshipsRef**](VersionsApi.md#postVersionRelationshipsRef) | **POST** /data/v1/projects/{project_id}/versions/{version_id}/relationships/refs | 


# **getVersion**
> \Swagger\Client\Model\Version getVersion($project_id, $version_id)



Returns the version with the given `version_id`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\VersionsApi();
$project_id = "project_id_example"; // string | the `project id`
$version_id = "version_id_example"; // string | the `version id`

try {
    $result = $api_instance->getVersion($project_id, $version_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VersionsApi->getVersion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **version_id** | **string**| the &#x60;version id&#x60; |

### Return type

[**\Swagger\Client\Model\Version**](../Model/Version.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getVersionItem**
> \Swagger\Client\Model\Item getVersionItem($project_id, $version_id)



Returns the item the given version is associated with.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\VersionsApi();
$project_id = "project_id_example"; // string | the `project id`
$version_id = "version_id_example"; // string | the `version id`

try {
    $result = $api_instance->getVersionItem($project_id, $version_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VersionsApi->getVersionItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **version_id** | **string**| the &#x60;version id&#x60; |

### Return type

[**\Swagger\Client\Model\Item**](../Model/Item.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getVersionRefs**
> \Swagger\Client\Model\JsonApiCollection getVersionRefs($project_id, $version_id, $filter_type, $filter_id, $filter_extension_type)



Returns the resources (`items`, `folders`, and `versions`) which have a custom relationship with the given `version_id`. Custom relationships can be established between a version of an item and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\VersionsApi();
$project_id = "project_id_example"; // string | the `project id`
$version_id = "version_id_example"; // string | the `version id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $api_instance->getVersionRefs($project_id, $version_id, $filter_type, $filter_id, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VersionsApi->getVersionRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **version_id** | **string**| the &#x60;version id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Swagger\Client\Model\JsonApiCollection**](../Model/JsonApiCollection.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getVersionRelationshipsRefs**
> \Swagger\Client\Model\Refs getVersionRelationshipsRefs($project_id, $version_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type)



Returns the custom relationships that are associated to the given `version_id`. Custom relationships can be established between a version of an item and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\VersionsApi();
$project_id = "project_id_example"; // string | the `project id`
$version_id = "version_id_example"; // string | the `version id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_ref_type = array("filter_ref_type_example"); // string[] | filter by `refType`
$filter_direction = "filter_direction_example"; // string | filter by the direction of the reference
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $api_instance->getVersionRelationshipsRefs($project_id, $version_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling VersionsApi->getVersionRelationshipsRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **version_id** | **string**| the &#x60;version id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_ref_type** | **string[]**| filter by &#x60;refType&#x60; | [optional]
 **filter_direction** | **string**| filter by the direction of the reference | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Swagger\Client\Model\Refs**](../Model/Refs.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postVersionRelationshipsRef**
> postVersionRelationshipsRef($project_id, $version_id, $body)



Creates a custom relationship between a version and another resource within the 'data' domain service (folder, item, or version).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\VersionsApi();
$project_id = "project_id_example"; // string | the `project id`
$version_id = "version_id_example"; // string | the `version id`
$body = new \Swagger\Client\Model\CreateRef(); // \Swagger\Client\Model\CreateRef | describe the ref to be created

try {
    $api_instance->postVersionRelationshipsRef($project_id, $version_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling VersionsApi->postVersionRelationshipsRef: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **version_id** | **string**| the &#x60;version id&#x60; |
 **body** | [**\Swagger\Client\Model\CreateRef**](../Model/\Swagger\Client\Model\CreateRef.md)| describe the ref to be created |

### Return type

void (empty response body)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

