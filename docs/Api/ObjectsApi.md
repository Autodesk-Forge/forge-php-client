# Autodesk\Forge\Client\ObjectsApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**copyTo**](ObjectsApi.md#copyTo) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName}/copyto/{newObjName} | 
[**createSignedResource**](ObjectsApi.md#createSignedResource) | **POST** /oss/v2/buckets/{bucketKey}/objects/{objectName}/signed | 
[**deleteObject**](ObjectsApi.md#deleteObject) | **DELETE** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
[**deleteSignedResource**](ObjectsApi.md#deleteSignedResource) | **DELETE** /oss/v2/signedresources/{id} | 
[**getObject**](ObjectsApi.md#getObject) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
[**getObjectDetails**](ObjectsApi.md#getObjectDetails) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName}/details | 
[**getObjects**](ObjectsApi.md#getObjects) | **GET** /oss/v2/buckets/{bucketKey}/objects | 
[**getSignedResource**](ObjectsApi.md#getSignedResource) | **GET** /oss/v2/signedresources/{id} | 
[**getStatusBySessionId**](ObjectsApi.md#getStatusBySessionId) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName}/status/{sessionId} | 
[**uploadChunk**](ObjectsApi.md#uploadChunk) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName}/resumable | 
[**uploadObject**](ObjectsApi.md#uploadObject) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
[**uploadSignedResource**](ObjectsApi.md#uploadSignedResource) | **PUT** /oss/v2/signedresources/{id} | 
[**uploadSignedResourcesChunk**](ObjectsApi.md#uploadSignedResourcesChunk) | **PUT** /oss/v2/signedresources/{id}/resumable | 


# **copyTo**
> \Autodesk\Forge\Client\Model\ObjectDetails copyTo($bucket_key, $object_name, $new_obj_name)



Copies an object to another object name in the same bucket.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$new_obj_name = "new_obj_name_example"; // string | URL-encoded Object key to use as the destination

try {
    $result = $apiInstance->copyTo($bucket_key, $object_name, $new_obj_name);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->copyTo: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **new_obj_name** | **string**| URL-encoded Object key to use as the destination |

### Return type

[**\Autodesk\Forge\Client\Model\ObjectDetails**](../Model/ObjectDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **createSignedResource**
> \Autodesk\Forge\Client\Model\PostObjectSigned createSignedResource($bucket_key, $object_name, $post_buckets_signed, $access)



This endpoint creates a signed URL that can be used to download an object within the specified expiration time. Be aware that if the object the signed URL points to is deleted or expires before the signed URL expires, then the signed URL will no longer be valid. A successful call to this endpoint requires bucket owner access.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$post_buckets_signed = new \Autodesk\Forge\Client\Model\PostBucketsSigned(); // \Autodesk\Forge\Client\Model\PostBucketsSigned | Body Structure
$access = "read"; // string | Access for signed resource Acceptable values: `read`, `write`, `readwrite`. Default value: `read`

try {
    $result = $apiInstance->createSignedResource($bucket_key, $object_name, $post_buckets_signed, $access);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->createSignedResource: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **post_buckets_signed** | [**\Autodesk\Forge\Client\Model\PostBucketsSigned**](../Model/\Autodesk\Forge\Client\Model\PostBucketsSigned.md)| Body Structure |
 **access** | **string**| Access for signed resource Acceptable values: &#x60;read&#x60;, &#x60;write&#x60;, &#x60;readwrite&#x60;. Default value: &#x60;read&#x60; | [optional] [default to read]

### Return type

[**\Autodesk\Forge\Client\Model\PostObjectSigned**](../Model/PostObjectSigned.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteObject**
> deleteObject($bucket_key, $object_name)



Deletes an object from the bucket.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name

try {
    $apiInstance->deleteObject($bucket_key, $object_name);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->deleteObject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteSignedResource**
> deleteSignedResource($id, $region)



Delete a signed URL. A successful call to this endpoint requires bucket owner access.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$id = "id_example"; // string | Id of signed resource
$region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`

try {
    $apiInstance->deleteSignedResource($id, $region);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->deleteSignedResource: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of signed resource |
 **region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: text/plain

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getObject**
> \SplFileObject getObject($bucket_key, $object_name, $range, $if_none_match, $if_modified_since, $accept_encoding)



Download an object.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$range = "range_example"; // string | A range of bytes to download from the specified object.
$if_none_match = "if_none_match_example"; // string | The value of this header is compared to the ETAG of the object. If they match, the body will not be included in the response. Only the object information will be included.
$if_modified_since = new \DateTime(); // \DateTime | If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body.
$accept_encoding = "accept_encoding_example"; // string | When gzip is specified, a gzip compressed stream of the object’s bytes will be returned in the response. Cannot use “Accept-Encoding:gzip” with Range header containing an end byte range. End byte range will not be honored if “Accept-Encoding: gzip” header is used.

try {
    $result = $apiInstance->getObject($bucket_key, $object_name, $range, $if_none_match, $if_modified_since, $accept_encoding);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->getObject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **range** | **string**| A range of bytes to download from the specified object. | [optional]
 **if_none_match** | **string**| The value of this header is compared to the ETAG of the object. If they match, the body will not be included in the response. Only the object information will be included. | [optional]
 **if_modified_since** | **\DateTime**| If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body. | [optional]
 **accept_encoding** | **string**| When gzip is specified, a gzip compressed stream of the object’s bytes will be returned in the response. Cannot use “Accept-Encoding:gzip” with Range header containing an end byte range. End byte range will not be honored if “Accept-Encoding: gzip” header is used. | [optional]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getObjectDetails**
> \Autodesk\Forge\Client\Model\ObjectFullDetails getObjectDetails($bucket_key, $object_name, $if_modified_since, $with)



Returns object details in JSON format.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$if_modified_since = new \DateTime(); // \DateTime | If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body.
$with = "with_example"; // string | Extra information in details; multiple uses are supported Acceptable values: `createdDate`, `lastAccessedDate`, `lastModifiedDate`

try {
    $result = $apiInstance->getObjectDetails($bucket_key, $object_name, $if_modified_since, $with);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->getObjectDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **if_modified_since** | **\DateTime**| If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body. | [optional]
 **with** | **string**| Extra information in details; multiple uses are supported Acceptable values: &#x60;createdDate&#x60;, &#x60;lastAccessedDate&#x60;, &#x60;lastModifiedDate&#x60; | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\ObjectFullDetails**](../Model/ObjectFullDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getObjects**
> \Autodesk\Forge\Client\Model\BucketObjects getObjects($bucket_key, $limit, $begins_with, $start_at)



List objects in a bucket. It is only available to the bucket creator.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$limit = 10; // int | Limit to the response size, Acceptable values: 1-100 Default = 10
$begins_with = "begins_with_example"; // string | Provides a way to filter the based on object key name
$start_at = "start_at_example"; // string | Key to use as an offset to continue pagination This is typically the last bucket key found in a preceding GET buckets response

try {
    $result = $apiInstance->getObjects($bucket_key, $limit, $begins_with, $start_at);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->getObjects: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **limit** | **int**| Limit to the response size, Acceptable values: 1-100 Default &#x3D; 10 | [optional] [default to 10]
 **begins_with** | **string**| Provides a way to filter the based on object key name | [optional]
 **start_at** | **string**| Key to use as an offset to continue pagination This is typically the last bucket key found in a preceding GET buckets response | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\BucketObjects**](../Model/BucketObjects.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getSignedResource**
> \SplFileObject getSignedResource($id, $range, $if_none_match, $if_modified_since, $accept_encoding, $region)



Download an object using a signed URL.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$id = "id_example"; // string | Id of signed resource
$range = "range_example"; // string | A range of bytes to download from the specified object.
$if_none_match = "if_none_match_example"; // string | The value of this header is compared to the ETAG of the object. If they match, the body will not be included in the response. Only the object information will be included.
$if_modified_since = new \DateTime(); // \DateTime | If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body.
$accept_encoding = "accept_encoding_example"; // string | When gzip is specified, a gzip compressed stream of the object’s bytes will be returned in the response. Cannot use “Accept-Encoding:gzip” with Range header containing an end byte range. End byte range will not be honored if “Accept-Encoding: gzip” header is used.
$region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`

try {
    $result = $apiInstance->getSignedResource($id, $range, $if_none_match, $if_modified_since, $accept_encoding, $region);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->getSignedResource: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of signed resource |
 **range** | **string**| A range of bytes to download from the specified object. | [optional]
 **if_none_match** | **string**| The value of this header is compared to the ETAG of the object. If they match, the body will not be included in the response. Only the object information will be included. | [optional]
 **if_modified_since** | **\DateTime**| If the requested object has not been modified since the time specified in this field, an entity will not be returned from the server; instead, a 304 (not modified) response will be returned without any message body. | [optional]
 **accept_encoding** | **string**| When gzip is specified, a gzip compressed stream of the object’s bytes will be returned in the response. Cannot use “Accept-Encoding:gzip” with Range header containing an end byte range. End byte range will not be honored if “Accept-Encoding: gzip” header is used. | [optional]
 **region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]

### Return type

[**\SplFileObject**](../Model/\SplFileObject.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/octet-stream

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getStatusBySessionId**
> getStatusBySessionId($bucket_key, $object_name, $session_id)



This endpoint returns status information about a resumable upload.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$session_id = "session_id_example"; // string | Unique identifier of a session of a file being uploaded

try {
    $apiInstance->getStatusBySessionId($bucket_key, $object_name, $session_id);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->getStatusBySessionId: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **session_id** | **string**| Unique identifier of a session of a file being uploaded |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadChunk**
> \Autodesk\Forge\Client\Model\ObjectDetails uploadChunk($bucket_key, $object_name, $content_length, $content_range, $session_id, $body, $content_disposition, $if_match)



This endpoint allows resumable uploads for large files in chunks.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$content_length = 56; // int | Indicates the size of the request body.
$content_range = "content_range_example"; // string | Byte range of a segment being uploaded
$session_id = "session_id_example"; // string | Unique identifier of a session of a file being uploaded
$body = "/path/to/file.txt"; // \SplFileObject | 
$content_disposition = "content_disposition_example"; // string | The suggested default filename when downloading this object to a file after it has been uploaded.
$if_match = "if_match_example"; // string | If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written.

try {
    $result = $apiInstance->uploadChunk($bucket_key, $object_name, $content_length, $content_range, $session_id, $body, $content_disposition, $if_match);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->uploadChunk: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **content_length** | **int**| Indicates the size of the request body. |
 **content_range** | **string**| Byte range of a segment being uploaded |
 **session_id** | **string**| Unique identifier of a session of a file being uploaded |
 **body** | **\SplFileObject**|  |
 **content_disposition** | **string**| The suggested default filename when downloading this object to a file after it has been uploaded. | [optional]
 **if_match** | **string**| If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\ObjectDetails**](../Model/ObjectDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadObject**
> \Autodesk\Forge\Client\Model\ObjectDetails uploadObject($bucket_key, $object_name, $content_length, $body, $content_disposition, $if_match)



Upload an object. If the specified object name already exists in the bucket, the uploaded content will overwrite the existing content for the bucket name/object name combination.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key
$object_name = "object_name_example"; // string | URL-encoded object name
$content_length = 56; // int | Indicates the size of the request body.
$body = "/path/to/file.txt"; // \SplFileObject | 
$content_disposition = "content_disposition_example"; // string | The suggested default filename when downloading this object to a file after it has been uploaded.
$if_match = "if_match_example"; // string | If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written.

try {
    $result = $apiInstance->uploadObject($bucket_key, $object_name, $content_length, $body, $content_disposition, $if_match);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->uploadObject: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |
 **object_name** | **string**| URL-encoded object name |
 **content_length** | **int**| Indicates the size of the request body. |
 **body** | **\SplFileObject**|  |
 **content_disposition** | **string**| The suggested default filename when downloading this object to a file after it has been uploaded. | [optional]
 **if_match** | **string**| If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\ObjectDetails**](../Model/ObjectDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadSignedResource**
> \Autodesk\Forge\Client\Model\ObjectDetails uploadSignedResource($id, $content_length, $body, $content_disposition, $x_ads_region, $if_match)



Overwrite a existing object using a signed URL.  Conditions to call this operation:  Object is available Expiration period is valid Signed URL should be created with `write` or `readwrite`

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$id = "id_example"; // string | Id of signed resource
$content_length = 56; // int | Indicates the size of the request body.
$body = "/path/to/file.txt"; // \SplFileObject | 
$content_disposition = "content_disposition_example"; // string | The suggested default filename when downloading this object to a file after it has been uploaded.
$x_ads_region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`
$if_match = "if_match_example"; // string | If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written.

try {
    $result = $apiInstance->uploadSignedResource($id, $content_length, $body, $content_disposition, $x_ads_region, $if_match);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->uploadSignedResource: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of signed resource |
 **content_length** | **int**| Indicates the size of the request body. |
 **body** | **\SplFileObject**|  |
 **content_disposition** | **string**| The suggested default filename when downloading this object to a file after it has been uploaded. | [optional]
 **x_ads_region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]
 **if_match** | **string**| If-Match header containing a SHA-1 hash of the bytes in the request body can be sent by the calling service or client application with the request. If present, OSS will use the value of If-Match header to verify that a SHA-1 calculated for the uploaded bytes server side matches what was sent in the header. If not, the request is failed with a status 412 Precondition Failed and the data is not written. | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\ObjectDetails**](../Model/ObjectDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **uploadSignedResourcesChunk**
> \Autodesk\Forge\Client\Model\ObjectDetails uploadSignedResourcesChunk($id, $content_range, $session_id, $body, $content_disposition, $x_ads_region)



Resumable upload for signed URLs.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\ObjectsApi($authObject);
$id = "id_example"; // string | Id of signed resource
$content_range = "content_range_example"; // string | Byte range of a segment being uploaded
$session_id = "session_id_example"; // string | Unique identifier of a session of a file being uploaded
$body = "/path/to/file.txt"; // \SplFileObject | 
$content_disposition = "content_disposition_example"; // string | The suggested default filename when downloading this object to a file after it has been uploaded.
$x_ads_region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`

try {
    $result = $apiInstance->uploadSignedResourcesChunk($id, $content_range, $session_id, $body, $content_disposition, $x_ads_region);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling ObjectsApi->uploadSignedResourcesChunk: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **id** | **string**| Id of signed resource |
 **content_range** | **string**| Byte range of a segment being uploaded |
 **session_id** | **string**| Unique identifier of a session of a file being uploaded |
 **body** | **\SplFileObject**|  |
 **content_disposition** | **string**| The suggested default filename when downloading this object to a file after it has been uploaded. | [optional]
 **x_ads_region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]

### Return type

[**\Autodesk\Forge\Client\Model\ObjectDetails**](../Model/ObjectDetails.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/octet-stream
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

