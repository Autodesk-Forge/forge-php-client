# Autodesk\Forge\Client\AppPackagesApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createAppPackage**](AppPackagesApi.md#createAppPackage) | **POST** /autocad.io/us-east/v2/AppPackages | Creates an AppPackage module.
[**deleteAppPackage**](AppPackagesApi.md#deleteAppPackage) | **DELETE** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Removes a specific AppPackage.
[**deleteAppPackageHistory**](AppPackagesApi.md#deleteAppPackageHistory) | **POST** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.DeleteHistory | Removes the version history of the specified AppPackage.
[**getAllAppPackages**](AppPackagesApi.md#getAllAppPackages) | **GET** /autocad.io/us-east/v2/AppPackages | Returns the details of all AppPackages.
[**getAppPackage**](AppPackagesApi.md#getAppPackage) | **GET** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Returns the details of a specific AppPackage.
[**getAppPackageVersions**](AppPackagesApi.md#getAppPackageVersions) | **GET** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.GetVersions | Returns all old versions of a specified AppPackage.
[**getUploadUrl**](AppPackagesApi.md#getUploadUrl) | **GET** /autocad.io/us-east/v2/AppPackages/Operations.GetUploadUrl | Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage.
[**getUploadUrlWithRequireContentType**](AppPackagesApi.md#getUploadUrlWithRequireContentType) | **GET** /autocad.io/us-east/v2/AppPackages/Operations.GetUploadUrl(RequireContentType&#x3D;{require}) | Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage. Unlike the GetUploadUrl method that takes no parameters, this method allows the client to request that the pre-signed URL to be issued so that the subsequent HTTP PUT operation will require Content-Type&#x3D;binary/octet-stream.
[**patchAppPackage**](AppPackagesApi.md#patchAppPackage) | **PATCH** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Updates an AppPackage by specifying only the changed attributes.
[**setAppPackageVersion**](AppPackagesApi.md#setAppPackageVersion) | **POST** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.SetVersion | Sets the AppPackage to the specified version.
[**updateAppPackage**](AppPackagesApi.md#updateAppPackage) | **PUT** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Updates an AppPackage by redefining the entire Activity object.


# **createAppPackage**
> \Autodesk\Forge\Client\Model\AppPackage createAppPackage($app_package)

Creates an AppPackage module.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$app_package = new \Autodesk\Forge\Client\Model\AppPackage(); // \Autodesk\Forge\Client\Model\AppPackage | 

try {
    $result = $apiInstance->createAppPackage($app_package);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->createAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **app_package** | [**\Autodesk\Forge\Client\Model\AppPackage**](../Model/\Autodesk\Forge\Client\Model\AppPackage.md)|  |

### Return type

[**\Autodesk\Forge\Client\Model\AppPackage**](../Model/AppPackage.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteAppPackage**
> deleteAppPackage($id)

Removes a specific AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 

try {
    $apiInstance->deleteAppPackage($id);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->deleteAppPackage: ', $e->getMessage(), PHP_EOL;
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

# **deleteAppPackageHistory**
> deleteAppPackageHistory($id)

Removes the version history of the specified AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 

try {
    $apiInstance->deleteAppPackageHistory($id);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->deleteAppPackageHistory: ', $e->getMessage(), PHP_EOL;
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

# **getAllAppPackages**
> \Autodesk\Forge\Client\Model\DesignAutomationAppPackages getAllAppPackages()

Returns the details of all AppPackages.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);

try {
    $result = $apiInstance->getAllAppPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getAllAppPackages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Autodesk\Forge\Client\Model\DesignAutomationAppPackages**](../Model/DesignAutomationAppPackages.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAppPackage**
> \Autodesk\Forge\Client\Model\AppPackage getAppPackage($id)

Returns the details of a specific AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 

try {
    $result = $apiInstance->getAppPackage($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\Autodesk\Forge\Client\Model\AppPackage**](../Model/AppPackage.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAppPackageVersions**
> \Autodesk\Forge\Client\Model\DesignAutomationAppPackages getAppPackageVersions($id)

Returns all old versions of a specified AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 

try {
    $result = $apiInstance->getAppPackageVersions($id);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getAppPackageVersions: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |

### Return type

[**\Autodesk\Forge\Client\Model\DesignAutomationAppPackages**](../Model/DesignAutomationAppPackages.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUploadUrl**
> getUploadUrl()

Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);

try {
    $apiInstance->getUploadUrl();
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getUploadUrl: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getUploadUrlWithRequireContentType**
> getUploadUrlWithRequireContentType($require)

Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage. Unlike the GetUploadUrl method that takes no parameters, this method allows the client to request that the pre-signed URL to be issued so that the subsequent HTTP PUT operation will require Content-Type=binary/octet-stream.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$require = true; // bool | 

try {
    $apiInstance->getUploadUrlWithRequireContentType($require);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getUploadUrlWithRequireContentType: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **require** | **bool**|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **patchAppPackage**
> patchAppPackage($id, $app_package)

Updates an AppPackage by specifying only the changed attributes.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 
$app_package = new \Autodesk\Forge\Client\Model\AppPackageOptional(); // \Autodesk\Forge\Client\Model\AppPackageOptional | 

try {
    $apiInstance->patchAppPackage($id, $app_package);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->patchAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package** | [**\Autodesk\Forge\Client\Model\AppPackageOptional**](../Model/\Autodesk\Forge\Client\Model\AppPackageOptional.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **setAppPackageVersion**
> setAppPackageVersion($id, $app_package_version)

Sets the AppPackage to the specified version.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 
$app_package_version = new \Autodesk\Forge\Client\Model\AppPackageVersion(); // \Autodesk\Forge\Client\Model\AppPackageVersion | 

try {
    $apiInstance->setAppPackageVersion($id, $app_package_version);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->setAppPackageVersion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package_version** | [**\Autodesk\Forge\Client\Model\AppPackageVersion**](../Model/\Autodesk\Forge\Client\Model\AppPackageVersion.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **updateAppPackage**
> updateAppPackage($id, $app_package)

Updates an AppPackage by redefining the entire Activity object.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\AppPackagesApi($authObject);
$id = "id_example"; // string | 
$app_package = new \Autodesk\Forge\Client\Model\AppPackage(); // \Autodesk\Forge\Client\Model\AppPackage | 

try {
    $apiInstance->updateAppPackage($id, $app_package);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->updateAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package** | [**\Autodesk\Forge\Client\Model\AppPackage**](../Model/\Autodesk\Forge\Client\Model\AppPackage.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

