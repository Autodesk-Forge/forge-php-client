# ObjectFullDetails

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**bucket_key** | **string** | Bucket key | [optional] 
**object_id** | **string** | Object URN | [optional] 
**object_key** | **string** | Object name | [optional] 
**sha1** | **string** | Object SHA1 | [optional] 
**size** | **int** | Object size | [optional] 
**content_type** | **string** | Object content-type | [optional] 
**location** | **string** | URL to download the object | [optional] 
**block_sizes** | **int[]** | For delta-encoding. Represents whether a signature exists at a specific block size | [optional] 
**deltas** | [**\Autodesk\Forge\Client\Model\ObjectFullDetailsDeltas[]**](ObjectFullDetailsDeltas.md) | Patch files available for download related to this object | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


