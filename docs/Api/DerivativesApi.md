# Autodesk\Forge\Client\DerivativesApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteManifest**](DerivativesApi.md#deleteManifest) | **DELETE** /modelderivative/v2/designdata/{urn}/manifest | 
[**getDerivativeManifest**](DerivativesApi.md#getDerivativeManifest) | **GET** /modelderivative/v2/designdata/{urn}/manifest/{derivativeUrn} | 
[**getFormats**](DerivativesApi.md#getFormats) | **GET** /modelderivative/v2/designdata/formats | 
[**getManifest**](DerivativesApi.md#getManifest) | **GET** /modelderivative/v2/designdata/{urn}/manifest | 
[**getMetadata**](DerivativesApi.md#getMetadata) | **GET** /modelderivative/v2/designdata/{urn}/metadata | 
[**getModelviewMetadata**](DerivativesApi.md#getModelviewMetadata) | **GET** /modelderivative/v2/designdata/{urn}/metadata/{guid} | 
[**getModelviewProperties**](DerivativesApi.md#getModelviewProperties) | **GET** /modelderivative/v2/designdata/{urn}/metadata/{guid}/properties | 
[**getThumbnail**](DerivativesApi.md#getThumbnail) | **GET** /modelderivative/v2/designdata/{urn}/thumbnail | 
[**translate**](DerivativesApi.md#translate) | **POST** /modelderivative/v2/designdata/job | 


# **deleteManifest**
> \Autodesk\Forge\Client\Model\Result deleteManifest($urn)



Deletes the manifest and all its translated output files (derivatives). However, it does not delete the design source file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN

try {
    $result = $apiInstance->deleteManifest($urn);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->deleteManifest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |

### Return type

[**\Autodesk\Forge\Client\Model\Result**](../Model/Result.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/x-www-form-urlencoded
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getDerivativeManifest**
> getDerivativeManifest($urn, $derivative_urn, $range)



Downloads a selected derivative. To download the file, you need to specify the file’s URN, which you retrieve by calling the [GET {urn}/manifest](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-manifest-GET) endpoint.  Note that the Model Derivative API uses 2 types of URNs. The **design URN** is generated when you upload the source design file to Forge, and is used when calling most of the Model Derivative endpoints. A **derivative URN** is generated for each translated output file format, and is used for downloading the output design files.  You can set the range of bytes that are returned when downloading the derivative, using the range header.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$derivative_urn = "derivative_urn_example"; // string | The URL-encoded URN of the derivatives. The URN is retrieved from the GET :urn/manifest endpoint.
$range = 56; // int | This is the standard RFC 2616 range request header. It only supports one range specifier per request: 1. Range:bytes=0-63 (returns the first 64 bytes) 2. Range:bytes=64-127 (returns the second set of 64 bytes) 3. Range:bytes=1022- (returns all the bytes from offset 1022 to the end) 4. If the range header is not specified, the whole content is returned.

try {
    $apiInstance->getDerivativeManifest($urn, $derivative_urn, $range);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getDerivativeManifest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **derivative_urn** | **string**| The URL-encoded URN of the derivatives. The URN is retrieved from the GET :urn/manifest endpoint. |
 **range** | **int**| This is the standard RFC 2616 range request header. It only supports one range specifier per request: 1. Range:bytes&#x3D;0-63 (returns the first 64 bytes) 2. Range:bytes&#x3D;64-127 (returns the second set of 64 bytes) 3. Range:bytes&#x3D;1022- (returns all the bytes from offset 1022 to the end) 4. If the range header is not specified, the whole content is returned. | [optional]

### Return type

void (empty response body)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getFormats**
> \Autodesk\Forge\Client\Model\Formats getFormats($if_modified_since, $accept_encoding)



Returns an up-to-date list of Forge-supported translations, that you can use to identify which types of derivatives are supported for each source file type. You can set this endpoint to only return the list of supported translations if they have been updated since a specified date.  See the [Supported Translation Formats table](https://developer.autodesk.com/en/docs/model-derivative/v2/overview/supported-translations) for more details about supported translations.  Note that we are constantly adding new file formats to the list of Forge translations.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$if_modified_since = new \DateTime(); // \DateTime | The supported formats are only returned if they were modified since the specified date. An invalid date returns the latest supported format list. If the supported formats have not been modified since the specified date, the endpoint returns a `NOT MODIFIED` (304) response.
$accept_encoding = "accept_encoding_example"; // string | If specified with `gzip` or `*`, content will be compressed and returned in a GZIP format.

try {
    $result = $apiInstance->getFormats($if_modified_since, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getFormats: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **if_modified_since** | **\DateTime**| The supported formats are only returned if they were modified since the specified date. An invalid date returns the latest supported format list. If the supported formats have not been modified since the specified date, the endpoint returns a &#x60;NOT MODIFIED&#x60; (304) response. | [optional]
 **accept_encoding** | **string**| If specified with &#x60;gzip&#x60; or &#x60;*&#x60;, content will be compressed and returned in a GZIP format. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Formats**](../Model/Formats.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getManifest**
> \Autodesk\Forge\Client\Model\Manifest getManifest($urn, $accept_encoding)



Returns information about derivatives that correspond to a specific source file, including derviative URNs and statuses.  The URNs of the derivatives are used to download the generated derivatives when calling the [GET {urn}/manifest/{derivativeurn}](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-manifest-derivativeurn-GET) endpoint.  The statuses are used to verify whether the translation of requested output files is complete.  Note that different output files might complete their translation processes at different times, and therefore may have different `status` values.  When translating a source file a second time, the previously created manifest is not deleted; it appends the information (only new translations) to the manifest.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$accept_encoding = "accept_encoding_example"; // string | If specified with `gzip` or `*`, content will be compressed and returned in a GZIP format.

try {
    $result = $apiInstance->getManifest($urn, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getManifest: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **accept_encoding** | **string**| If specified with &#x60;gzip&#x60; or &#x60;*&#x60;, content will be compressed and returned in a GZIP format. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Manifest**](../Model/Manifest.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getMetadata**
> \Autodesk\Forge\Client\Model\Metadata getMetadata($urn, $accept_encoding)



Returns a list of model view (metadata) IDs for a design model. The metadata ID enables end users to select an object tree and properties for a specific model view.  Although most design apps (e.g., Fusion and Inventor) only allow a single model view (object tree and set of properties), some apps (e.g., Revit) allow users to design models with multiple model views (e.g., HVAC, architecture, perspective).  Note that you can only retrieve metadata from an input file that has been translated into an SVF file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$accept_encoding = "accept_encoding_example"; // string | If specified with `gzip` or `*`, content will be compressed and returned in a GZIP format.

try {
    $result = $apiInstance->getMetadata($urn, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getMetadata: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **accept_encoding** | **string**| If specified with &#x60;gzip&#x60; or &#x60;*&#x60;, content will be compressed and returned in a GZIP format. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Metadata**](../Model/Metadata.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getModelviewMetadata**
> \Autodesk\Forge\Client\Model\Metadata getModelviewMetadata($urn, $guid, $accept_encoding)



Returns an object tree, i.e., a hierarchical list of objects for a model view.  To call this endpoint you first need to call the [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) endpoint, to determine which model view (object tree and set of properties) to use.  Although most design apps (e.g., Fusion and Inventor) only allow a single model view, some apps (e.g., Revit) allow users to design models with multiple model views (e.g., HVAC, architecture, perspective).  Note that you can only retrieve metadata from an input file that has been translated into an SVF file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$guid = "guid_example"; // string | Unique model view ID. Call [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) to get the ID
$accept_encoding = "accept_encoding_example"; // string | If specified with `gzip` or `*`, content will be compressed and returned in a GZIP format.

try {
    $result = $apiInstance->getModelviewMetadata($urn, $guid, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getModelviewMetadata: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **guid** | **string**| Unique model view ID. Call [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) to get the ID |
 **accept_encoding** | **string**| If specified with &#x60;gzip&#x60; or &#x60;*&#x60;, content will be compressed and returned in a GZIP format. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Metadata**](../Model/Metadata.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getModelviewProperties**
> \Autodesk\Forge\Client\Model\Metadata getModelviewProperties($urn, $guid, $accept_encoding)



Returns a list of properties for each object in an object tree. Properties are returned according to object ID and do not follow a hierarchical structure.  The following image displays a typical list of properties for a Revit object:  ![](https://developer.doc.autodesk.com/bPlouYTd/7/_images/Properties.png)  To call this endpoint you need to first call the [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) endpoint, which returns a list of model view (metadata) IDs for a design input model. Select a model view (metadata) ID to use when calling the Get Properties endpoint.  Note that you can only get properties from a design input file that was previously translated into an SVF file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$guid = "guid_example"; // string | Unique model view ID. Call [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) to get the ID
$accept_encoding = "accept_encoding_example"; // string | If specified with `gzip` or `*`, content will be compressed and returned in a GZIP format.

try {
    $result = $apiInstance->getModelviewProperties($urn, $guid, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getModelviewProperties: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **guid** | **string**| Unique model view ID. Call [GET {urn}/metadata](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-metadata-GET) to get the ID |
 **accept_encoding** | **string**| If specified with &#x60;gzip&#x60; or &#x60;*&#x60;, content will be compressed and returned in a GZIP format. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Metadata**](../Model/Metadata.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getThumbnail**
> \SplFileObject getThumbnail($urn, $width, $height)



Returns the thumbnail for the source file.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$urn = "urn_example"; // string | The Base64 (URL Safe) encoded design URN
$width = 56; // int | The desired width of the thumbnail. Possible values are 100, 200 and 400.
$height = 56; // int | The desired height of the thumbnail. Possible values are 100, 200 and 400.

try {
    $result = $apiInstance->getThumbnail($urn, $width, $height);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->getThumbnail: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **urn** | **string**| The Base64 (URL Safe) encoded design URN |
 **width** | **int**| The desired width of the thumbnail. Possible values are 100, 200 and 400. | [optional]
 **height** | **int**| The desired height of the thumbnail. Possible values are 100, 200 and 400. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **translate**
> \Autodesk\Forge\Client\Model\Job translate($job, $x_ads_force)



Translate a source file from one format to another.  Derivatives are stored in a manifest that is updated each time this endpoint is used on a source file.  Note that this endpoint is asynchronous and initiates a process that runs in the background, rather than keeping an open HTTP connection until completion. Use the [GET {urn}/manifest](https://developer.autodesk.com/en/docs/model-derivative/v2/reference/http/urn-manifest-GET) endpoint to poll for the job’s completion.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\DerivativesApi($authObject);
$job = new \Autodesk\Forge\Client\Model\JobPayload(); // \Autodesk\Forge\Client\Model\JobPayload | 
$x_ads_force = false; // bool | `true`: the endpoint replaces previously translated output file types with the newly generated derivatives  `false` (default): previously created derivatives are not replaced

try {
    $result = $apiInstance->translate($job, $x_ads_force);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DerivativesApi->translate: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **job** | [**\Autodesk\Forge\Client\Model\JobPayload**](../Model/\Autodesk\Forge\Client\Model\JobPayload.md)|  |
 **x_ads_force** | **bool**| &#x60;true&#x60;: the endpoint replaces previously translated output file types with the newly generated derivatives  &#x60;false&#x60; (default): previously created derivatives are not replaced | [optional] [default to false]

### Return type

[**\Autodesk\Forge\Client\Model\Job**](../Model/Job.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code), [oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

