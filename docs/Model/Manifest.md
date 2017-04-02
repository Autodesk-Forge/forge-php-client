# Manifest

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**urn** | **string** | The Base64 (URL safe) encoded source file URN | 
**type** | **string** | Type of this JSON object | 
**progress** | **string** | Overall progress for all translation jobs in the manifest. Possible values are: &#x60;complete&#x60; or &#x60;##%&#x60; | 
**status** | **string** | Overall status for translation jobs in the “manifest”. Possible values are: &#x60;pending&#x60;, &#x60;success&#x60;, &#x60;inprogress&#x60;, &#x60;failed&#x60; and &#x60;timeout&#x60; | 
**has_thumbnail** | **bool** | Indicates if a thumbnail has been generated for the source file URN | 
**region** | **string** | Region | [optional] 
**derivatives** | [**\Autodesk\Forge\Client\Model\ManifestDerivative[]**](ManifestDerivative.md) | Requested output files for the source file URN | 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


