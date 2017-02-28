# Autodesk\Client\AppPackagesApi

All URIs are relative to *https://developer.api.autodesk.com/*

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
> \Autodesk\Client\Model\AppPackage createAppPackage($app_package)

Creates an AppPackage module.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$app_package = new \Autodesk\Client\Model\AppPackage(); // \Autodesk\Client\Model\AppPackage | 

try {
    $result = $api_instance->createAppPackage($app_package);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->createAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **app_package** | [**\Autodesk\Client\Model\AppPackage**](../Model/\Autodesk\Client\Model\AppPackage.md)|  |

### Return type

[**\Autodesk\Client\Model\AppPackage**](../Model/AppPackage.md)

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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 

try {
    $api_instance->deleteAppPackage($id);
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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 

try {
    $api_instance->deleteAppPackageHistory($id);
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
> \Autodesk\Client\Model\DesignAutomationAppPackages getAllAppPackages()

Returns the details of all AppPackages.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();

try {
    $result = $api_instance->getAllAppPackages();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->getAllAppPackages: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Autodesk\Client\Model\DesignAutomationAppPackages**](../Model/DesignAutomationAppPackages.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAppPackage**
> \Autodesk\Client\Model\AppPackage getAppPackage($id)

Returns the details of a specific AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 

try {
    $result = $api_instance->getAppPackage($id);
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

[**\Autodesk\Client\Model\AppPackage**](../Model/AppPackage.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getAppPackageVersions**
> \Autodesk\Client\Model\DesignAutomationAppPackages getAppPackageVersions($id)

Returns all old versions of a specified AppPackage.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 

try {
    $result = $api_instance->getAppPackageVersions($id);
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

[**\Autodesk\Client\Model\DesignAutomationAppPackages**](../Model/DesignAutomationAppPackages.md)

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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();

try {
    $api_instance->getUploadUrl();
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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$require = true; // bool | 

try {
    $api_instance->getUploadUrlWithRequireContentType($require);
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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 
$app_package = new \Autodesk\Client\Model\AppPackageOptional(); // \Autodesk\Client\Model\AppPackageOptional | 

try {
    $api_instance->patchAppPackage($id, $app_package);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->patchAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package** | [**\Autodesk\Client\Model\AppPackageOptional**](../Model/\Autodesk\Client\Model\AppPackageOptional.md)|  |

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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 
$app_package_version = new \Autodesk\Client\Model\AppPackageVersion(); // \Autodesk\Client\Model\AppPackageVersion | 

try {
    $api_instance->setAppPackageVersion($id, $app_package_version);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->setAppPackageVersion: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package_version** | [**\Autodesk\Client\Model\AppPackageVersion**](../Model/\Autodesk\Client\Model\AppPackageVersion.md)|  |

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

// Configure OAuth2 access token for authorization: oauth2_application
Autodesk\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');

$api_instance = new Autodesk\Client\Api\AppPackagesApi();
$id = "id_example"; // string | 
$app_package = new \Autodesk\Client\Model\AppPackage(); // \Autodesk\Client\Model\AppPackage | 

try {
    $api_instance->updateAppPackage($id, $app_package);
} catch (Exception $e) {
    echo 'Exception when calling AppPackagesApi->updateAppPackage: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**|  |
 **app_package** | [**\Autodesk\Client\Model\AppPackage**](../Model/\Autodesk\Client\Model\AppPackage.md)|  |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

