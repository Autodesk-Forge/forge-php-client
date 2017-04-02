# Autodesk\Forge\Client\ItemsApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getItem**](ItemsApi.md#getItem) | **GET** /data/v1/projects/{project_id}/items/{item_id} | 
[**getItemParentFolder**](ItemsApi.md#getItemParentFolder) | **GET** /data/v1/projects/{project_id}/items/{item_id}/parent | 
[**getItemRefs**](ItemsApi.md#getItemRefs) | **GET** /data/v1/projects/{project_id}/items/{item_id}/refs | 
[**getItemRelationshipsRefs**](ItemsApi.md#getItemRelationshipsRefs) | **GET** /data/v1/projects/{project_id}/items/{item_id}/relationships/refs | 
[**getItemTip**](ItemsApi.md#getItemTip) | **GET** /data/v1/projects/{project_id}/items/{item_id}/tip | 
[**getItemVersions**](ItemsApi.md#getItemVersions) | **GET** /data/v1/projects/{project_id}/items/{item_id}/versions | 
[**postItem**](ItemsApi.md#postItem) | **POST** /data/v1/projects/{project_id}/items | 
[**postItemRelationshipsRef**](ItemsApi.md#postItemRelationshipsRef) | **POST** /data/v1/projects/{project_id}/items/{item_id}/relationships/refs | 


# **getItem**
> \Autodesk\Forge\Client\Model\Item getItem($project_id, $item_id)



Returns a resource item by ID for any item within a given project. Resource items represent word documents, fusion design files, drawings, spreadsheets, etc.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`

try {
    $result = $apiInstance->getItem($project_id, $item_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |

### Return type

[**\Autodesk\Forge\Client\Model\Item**](../Model/Item.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getItemParentFolder**
> \Autodesk\Forge\Client\Model\Folder getItemParentFolder($project_id, $item_id)



Returns the \"parent\" folder for the given item.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`

try {
    $result = $apiInstance->getItemParentFolder($project_id, $item_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItemParentFolder: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |

### Return type

[**\Autodesk\Forge\Client\Model\Folder**](../Model/Folder.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getItemRefs**
> \Autodesk\Forge\Client\Model\JsonApiCollection getItemRefs($project_id, $item_id, $filter_type, $filter_id, $filter_extension_type)



Returns the resources (`items`, `folders`, and `versions`) which have a custom relationship with the given `item_id`. Custom relationships can be established between an item and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $apiInstance->getItemRefs($project_id, $item_id, $filter_type, $filter_id, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItemRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\JsonApiCollection**](../Model/JsonApiCollection.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getItemRelationshipsRefs**
> \Autodesk\Forge\Client\Model\Refs getItemRelationshipsRefs($project_id, $item_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type)



Returns the custom relationships that are associated to the given `item_id`. Custom relationships can be established between an item and other resources within the 'data' domain service (folders, items, and versions).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_ref_type = array("filter_ref_type_example"); // string[] | filter by `refType`
$filter_direction = "filter_direction_example"; // string | filter by the direction of the reference
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type

try {
    $result = $apiInstance->getItemRelationshipsRefs($project_id, $item_id, $filter_type, $filter_id, $filter_ref_type, $filter_direction, $filter_extension_type);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItemRelationshipsRefs: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_ref_type** | **string[]**| filter by &#x60;refType&#x60; | [optional]
 **filter_direction** | **string**| filter by the direction of the reference | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Refs**](../Model/Refs.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getItemTip**
> \Autodesk\Forge\Client\Model\Version getItemTip($project_id, $item_id)



Returns the \"tip\" version for the given item. Multiple versions of a resource item can be uploaded in a project. The tip version is the most recent one.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`

try {
    $result = $apiInstance->getItemTip($project_id, $item_id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItemTip: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |

### Return type

[**\Autodesk\Forge\Client\Model\Version**](../Model/Version.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getItemVersions**
> \Autodesk\Forge\Client\Model\Versions getItemVersions($project_id, $item_id, $filter_type, $filter_id, $filter_extension_type, $filter_version_number, $page_number, $page_limit)



Returns versions for the given item. Multiple versions of a resource item can be uploaded in a project.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`
$filter_type = array("filter_type_example"); // string[] | filter by the `type` of the `ref` target
$filter_id = array("filter_id_example"); // string[] | filter by the `id` of the `ref` target
$filter_extension_type = array("filter_extension_type_example"); // string[] | filter by the extension type
$filter_version_number = array(56); // int[] | filter by `versionNumber`
$page_number = 56; // int | specify the page number
$page_limit = 56; // int | specify the maximal number of elements per page

try {
    $result = $apiInstance->getItemVersions($project_id, $item_id, $filter_type, $filter_id, $filter_extension_type, $filter_version_number, $page_number, $page_limit);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->getItemVersions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |
 **filter_type** | **string[]**| filter by the &#x60;type&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_id** | **string[]**| filter by the &#x60;id&#x60; of the &#x60;ref&#x60; target | [optional]
 **filter_extension_type** | **string[]**| filter by the extension type | [optional]
 **filter_version_number** | **int[]**| filter by &#x60;versionNumber&#x60; | [optional]
 **page_number** | **int**| specify the page number | [optional]
 **page_limit** | **int**| specify the maximal number of elements per page | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Versions**](../Model/Versions.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postItem**
> \Autodesk\Forge\Client\Model\ItemCreated postItem($project_id, $body)



Creates a new item in the 'data' domain service.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$body = new \Autodesk\Forge\Client\Model\CreateItem(); // \Autodesk\Forge\Client\Model\CreateItem | describe the item to be created

try {
    $result = $apiInstance->postItem($project_id, $body);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->postItem: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **body** | [**\Autodesk\Forge\Client\Model\CreateItem**](../Model/\Autodesk\Forge\Client\Model\CreateItem.md)| describe the item to be created |

### Return type

[**\Autodesk\Forge\Client\Model\ItemCreated**](../Model/ItemCreated.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **postItemRelationshipsRef**
> postItemRelationshipsRef($project_id, $item_id, $body)



Creates a custom relationship between an item and another resource within the 'data' domain service (folder, item, or version).

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ItemsApi($authObject);
$project_id = "project_id_example"; // string | the `project id`
$item_id = "item_id_example"; // string | the `item id`
$body = new \Autodesk\Forge\Client\Model\CreateRef(); // \Autodesk\Forge\Client\Model\CreateRef | describe the ref to be created

try {
    $apiInstance->postItemRelationshipsRef($project_id, $item_id, $body);
} catch (Exception $e) {
    echo 'Exception when calling ItemsApi->postItemRelationshipsRef: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **project_id** | **string**| the &#x60;project id&#x60; |
 **item_id** | **string**| the &#x60;item id&#x60; |
 **body** | [**\Autodesk\Forge\Client\Model\CreateRef**](../Model/\Autodesk\Forge\Client\Model\CreateRef.md)| describe the ref to be created |

### Return type

void (empty response body)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/vnd.api+json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

