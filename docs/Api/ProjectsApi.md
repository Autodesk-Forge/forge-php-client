# Swagger\Client\ProjectsApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getHubProjects**](ProjectsApi.md#getHubProjects) | **GET** /project/v1/hubs/{hub_id}/projects | 
[**getProject**](ProjectsApi.md#getProject) | **GET** /project/v1/hubs/{hub_id}/projects/{project_id} | 
[**getProjectHub**](ProjectsApi.md#getProjectHub) | **GET** /project/v1/hubs/{hub_id}/projects/{project_id}/hub | 
[**postStorage**](ProjectsApi.md#postStorage) | **POST** /data/v1/projects/{project_id}/storage | 
[**postVersion**](ProjectsApi.md#postVersion) | **POST** /data/v1/projects/{project_id}/versions | 


# **getHubProjects**
> \Swagger\Client\Model\Projects getHubProjects($hub_id, $filter_id, $filter_extension_type)



Returns a collection of projects for a given `hub_id`. A project represents an A360 project or a BIM 360 project which is set up under an A360 hub or BIM 360 account, respectively. Within a hub or an account, multiple projects can be created to be used.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\ProjectsApi();
$hub_id = "hub_id_example"; // string | the `hub id` for the current operation
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $api_instance->getHubProjects($hub_id, $filter_id, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getHubProjects: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **hub_id** | **string**| the &#x60;hub id&#x60; for the current operation |
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Swagger\Client\Model\Projects**](../Model/Projects.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProject**
> \Swagger\Client\Model\Project getProject($hub_id, $project_id)



Returns a project for a given `project_id`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\ProjectsApi();
$hub_id = "hub_id_example"; // string | the `hub id` for the current operation
$project_id = "project_id_example"; // string | the `project id`

try {
    $result = $api_instance->getProject($hub_id, $project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **hub_id** | **string**| the &#x60;hub id&#x60; for the current operation |
 **project_id** | **string**| the &#x60;project id&#x60; |

### Return type

[**\Swagger\Client\Model\Project**](../Model/Project.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getProjectHub**
> \Swagger\Client\Model\Hub getProjectHub($hub_id, $project_id)



Returns the hub for a given `project_id`.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\ProjectsApi();
$hub_id = "hub_id_example"; // string | the `hub id` for the current operation
$project_id = "project_id_example"; // string | the `project id`

try {
    $result = $api_instance->getProjectHub($hub_id, $project_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->getProjectHub: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **hub_id** | **string**| the &#x60;hub id&#x60; for the current operation |
 **project_id** | **string**| the &#x60;project id&#x60; |

### Return type

[**\Swagger\Client\Model\Hub**](../Model/Hub.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postStorage**
> \Swagger\Client\Model\StorageCreated postStorage($project_id, $body)



Creates a storage location in the OSS where data can be uploaded to.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\ProjectsApi();
$project_id = "project_id_example"; // string | the `project id`
$body = new \Swagger\Client\Model\CreateStorage(); // \Swagger\Client\Model\CreateStorage | describe the file the storage is created for

try {
    $result = $api_instance->postStorage($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->postStorage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **body** | [**\Swagger\Client\Model\CreateStorage**](../Model/\Swagger\Client\Model\CreateStorage.md)| describe the file the storage is created for |

### Return type

[**\Swagger\Client\Model\StorageCreated**](../Model/StorageCreated.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postVersion**
> \Swagger\Client\Model\VersionCreated postVersion($project_id, $body)



Creates a new version of an item in the 'data' domain service.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\ProjectsApi();
$project_id = "project_id_example"; // string | the `project id`
$body = new \Swagger\Client\Model\CreateVersion(); // \Swagger\Client\Model\CreateVersion | describe the version to be created

try {
    $result = $api_instance->postVersion($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ProjectsApi->postVersion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **body** | [**\Swagger\Client\Model\CreateVersion**](../Model/\Swagger\Client\Model\CreateVersion.md)| describe the version to be created |

### Return type

[**\Swagger\Client\Model\VersionCreated**](../Model/VersionCreated.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

