# Autodesk\Forge\Client\BucketsApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**createBucket**](BucketsApi.md#createBucket) | **POST** /oss/v2/buckets | 
[**deleteBucket**](BucketsApi.md#deleteBucket) | **DELETE** /oss/v2/buckets/{bucketKey} | 
[**getBucketDetails**](BucketsApi.md#getBucketDetails) | **GET** /oss/v2/buckets/{bucketKey}/details | 
[**getBuckets**](BucketsApi.md#getBuckets) | **GET** /oss/v2/buckets | 


# **createBucket**
> \Autodesk\Forge\Client\Model\Bucket createBucket($post_buckets, $x_ads_region)



Use this endpoint to create a bucket. Buckets are arbitrary spaces created and owned by applications. Bucket keys are globally unique across all regions, regardless of where they were created, and they cannot be changed. The application creating the bucket is the owner of the bucket.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\BucketsApi($authObject);
$post_buckets = new \Autodesk\Forge\Client\Model\PostBucketsPayload(); // \Autodesk\Forge\Client\Model\PostBucketsPayload | Body Structure
$x_ads_region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`

try {
    $result = $apiInstance->createBucket($post_buckets, $x_ads_region);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BucketsApi->createBucket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **post_buckets** | [**\Autodesk\Forge\Client\Model\PostBucketsPayload**](../Model/\Autodesk\Forge\Client\Model\PostBucketsPayload.md)| Body Structure |
 **x_ads_region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]

### Return type

[**\Autodesk\Forge\Client\Model\Bucket**](../Model/Bucket.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **deleteBucket**
> deleteBucket($bucket_key)



This endpoint will delete a bucket.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\BucketsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key

try {
    $apiInstance->deleteBucket($bucket_key);
} catch (Exception $e) {
    echo 'Exception when calling BucketsApi->deleteBucket: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |

### Return type

void (empty response body)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBucketDetails**
> \Autodesk\Forge\Client\Model\Bucket getBucketDetails($bucket_key)



This endpoint will return the buckets owned by the application. This endpoint supports pagination.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\BucketsApi($authObject);
$bucket_key = "bucket_key_example"; // string | URL-encoded bucket key

try {
    $result = $apiInstance->getBucketDetails($bucket_key);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BucketsApi->getBucketDetails: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **bucket_key** | **string**| URL-encoded bucket key |

### Return type

[**\Autodesk\Forge\Client\Model\Bucket**](../Model/Bucket.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

# **getBuckets**
> \Autodesk\Forge\Client\Model\Buckets getBuckets($region, $limit, $start_at)



This endpoint will return the buckets owned by the application. This endpoint supports pagination.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\BucketsApi($authObject);
$region = "US"; // string | The region where the bucket resides Acceptable values: `US`, `EMEA` Default is `US`
$limit = 10; // int | Limit to the response size, Acceptable values: 1-100 Default = 10
$start_at = "start_at_example"; // string | Key to use as an offset to continue pagination This is typically the last bucket key found in a preceding GET buckets response

try {
    $result = $apiInstance->getBuckets($region, $limit, $start_at);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling BucketsApi->getBuckets: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **region** | **string**| The region where the bucket resides Acceptable values: &#x60;US&#x60;, &#x60;EMEA&#x60; Default is &#x60;US&#x60; | [optional] [default to US]
 **limit** | **int**| Limit to the response size, Acceptable values: 1-100 Default &#x3D; 10 | [optional] [default to 10]
 **start_at** | **string**| Key to use as an offset to continue pagination This is typically the last bucket key found in a preceding GET buckets response | [optional]

### Return type

[**\Autodesk\Forge\Client\Model\Buckets**](../Model/Buckets.md)

### Authorization

[oauth2_application](../../README.md#oauth2_application)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

