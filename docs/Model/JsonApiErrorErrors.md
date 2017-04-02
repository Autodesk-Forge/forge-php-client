# JsonApiErrorErrors

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**id** | **string** | a unique identifier for this particular occurrence of the problem | 
**status** | **string** | the HTTP status code applicable to this problem, expressed as a string value | 
**code** | **string** | an application-specific error code, expressed as a string value | [optional] 
**title** | **string** | a short, human-readable summary of the problem that SHOULD NOT change from occurrence to occurrence of the problem, except for purposes of localization | [optional] 
**detail** | **string** | a human-readable explanation specific to this occurrence of the problem. Like title, this field&#39;s value can be localized | 
**meta** | **object** | a meta object containing non-standard meta-information about the error | [optional] 
**links** | [**\Autodesk\Forge\Client\Model\JsonApiErrorLinks**](JsonApiErrorLinks.md) |  | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


