# Autodesk\Forge\Client\UserProfileApi

All URIs are relative to *https://developer.api.autodesk.com*

Method | HTTP request | Description
------------- | ------------- | -------------
[**getUserProfile**](UserProfileApi.md#getUserProfile) | **GET** /userprofile/v1/users/@me | Returns the profile information of an authorizing end user.


# **getUserProfile**
> \Autodesk\Forge\Client\Model\UserProfile getUserProfile()

Returns the profile information of an authorizing end user.

### Example
```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');

$apiInstance = new Autodesk\Forge\Client\Api\UserProfileApi($authObject);

try {
    $result = $apiInstance->getUserProfile();
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling UserProfileApi->getUserProfile: ', $e->getMessage(), PHP_EOL;
}
?>
```

### Parameters
This endpoint does not need any parameter.

### Return type

[**\Autodesk\Forge\Client\Model\UserProfile**](../Model/UserProfile.md)

### Authorization

[oauth2_access_code](../../README.md#oauth2_access_code)

### HTTP request headers

 - **Content-Type**: application/json
 - **Accept**: application/vnd.api+json, application/json

[[Back to top]](#) [[Back to API list]](../../README.md#documentation-for-api-endpoints) [[Back to Model list]](../../README.md#documentation-for-models) [[Back to README]](../../README.md)

