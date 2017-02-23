# Swagger\Client\FoldersApi

All URIs are relative to *https://developer.api.autodesk.com/*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getFolder**](FoldersApi.md#getFolder) | **GET** /data/v1/projects/{project_id}/folders/{folder_id} | 
[**getFolderContents**](FoldersApi.md#getFolderContents) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/contents | 
[**getFolderParent**](FoldersApi.md#getFolderParent) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/parent | 
[**getFolderRefs**](FoldersApi.md#getFolderRefs) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/refs | 
[**getFolderRelationshipsRefs**](FoldersApi.md#getFolderRelationshipsRefs) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/relationships/refs | 
[**postFolderRelationshipsRef**](FoldersApi.md#postFolderRelationshipsRef) | **POST** /data/v1/projects/{project_id}/folders/{folder_id}/relationships/refs | 


# **getFolder**
> \Swagger\Client\Model\Folder getFolder($project_id, $folder_id)



Returns the folder by ID for any folder within a given project. All folders or sub-folders within a project are associated with their own unique ID, including the root folder.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`

try {
    $result = $api_instance->getFolder($project_id, $folder_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->getFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |

### Return type

[**\Swagger\Client\Model\Folder**](../Model/Folder.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFolderContents**
> \Swagger\Client\Model\JsonApiCollection getFolderContents($project_id, $folder_id, $filter_type, $filter_id, $filter_extension_type, $page_number, $page_limit)



Returns a collection of items and folders within a folder. Items represent word documents, fusion design files, drawings, spreadsheets, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type
$page_number = 56; // int | specify the page number
$page_limit = 56; // int | specify the maximal number of elements per page

try {
    $result = $api_instance->getFolderContents($project_id, $folder_id, $filter_type, $filter_id, $filter_extension_type, $page_number, $page_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->getFolderContents: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]
 **page_number** | **int**| specify the page number | [optional]
 **page_limit** | **int**| specify the maximal number of elements per page | [optional]

### Return type

[**\Swagger\Client\Model\JsonApiCollection**](../Model/JsonApiCollection.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFolderParent**
> \Swagger\Client\Model\Folder getFolderParent($project_id, $folder_id)



Returns the parent folder (if it exists). In a project, subfolders and resource items are stored under a folder except the root folder which does not have a parent of its own.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`

try {
    $result = $api_instance->getFolderParent($project_id, $folder_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->getFolderParent: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |

### Return type

[**\Swagger\Client\Model\Folder**](../Model/Folder.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFolderRefs**
> \Swagger\Client\Model\JsonApiCollection getFolderRefs($project_id, $folder_id, $filter_type, $filter_id, $filter_extension_type)



Returns the resources (`items`, `folders`, and `versions`) which have a custom relationship with the given `folder_id`. Custom relationships can be established between a folder and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $api_instance->getFolderRefs($project_id, $folder_id, $filter_type, $filter_id, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->getFolderRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |
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

# **getFolderRelationshipsRefs**
> \Swagger\Client\Model\Refs getFolderRelationshipsRefs($project_id, $folder_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type)



Returns the custom relationships that are associated to the given `folder_id`. Custom relationships can be established between a folder and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_ref_type = array("filter_ref_type_example"); // string[] | filter by `refType`
$filter_direction = "filter_direction_example"; // string | filter by the direction of the reference
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $api_instance->getFolderRelationshipsRefs($project_id, $folder_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->getFolderRelationshipsRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |
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

# **postFolderRelationshipsRef**
> postFolderRelationshipsRef($project_id, $folder_id, $body)



Creates a custom relationship between a folder and another resource within the 'data' domain service (folder, item, or version).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_access_code
Swagger\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Swagger\Client\Api\FoldersApi();
$project_id = "project_id_example"; // string | the `project id`
$folder_id = "folder_id_example"; // string | the `folder id`
$body = new \Swagger\Client\Model\CreateRef(); // \Swagger\Client\Model\CreateRef | describe the ref to be created

try {
    $api_instance->postFolderRelationshipsRef($project_id, $folder_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling FoldersApi->postFolderRelationshipsRef: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **folder_id** | **string**| the &#x60;folder id&#x60; |
 **body** | [**\Swagger\Client\Model\CreateRef**](../Model/\Swagger\Client\Model\CreateRef.md)| describe the ref to be created |

### Return type

void (empty response body)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

