# JobObjOutputPayloadAdvanced

## Properties
Name | Type | Description | Notes
------------ | ------------- | ------------- | -------------
**export_file_structure** | **string** | &#x60;single&#x60; (default): creates one OBJ file for all the input files (assembly file)  &#x60;multiple&#x60;: creates a separate OBJ file for each object | [optional] [default to 'single']
**model_guid** | **string** | Required for geometry extractions. The model view ID (guid). | [optional] 
**object_ids** | **string[]** | Required for geometry extractions. List object ids to be translated. -1 will extract the entire model. | [optional] 

[[Back to Model list]](../README.md#documentation-for-models) [[Back to API list]](../README.md#documentation-for-api-endpoints) [[Back to README]](../README.md)


