# Forge PHP SDK

## Overview
This [PHP](http://php.net/) SDK enables you to easily integrate the Forge REST APIs
into your application, including [OAuth](https://developer.autodesk.com/en/docs/oauth/v2/overview/),
[Data Management](https://developer.autodesk.com/en/docs/data/v2/overview/),
[Model Derivative](https://developer.autodesk.com/en/docs/model-derivative/v2/overview/),
and [Design Automation](https://developer.autodesk.com/en/docs/design-automation/v2/overview/).

### Requirements
* PHP 5.4.0 and later
* A registered app on the [Forge Developer portal](https://developer.autodesk.com/myapps).

### Installation
#### Composer

To install the bindings via [Composer](http://getcomposer.org/), run:
```
composer require autodesk-forge/client
```

#### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/AutodeskForge/autoload.php');
```

### Tests

To run the unit tests:

```
composer install
./vendor/bin/phpunit
```
## Tutorial
Follow this tutorial to see a step-by-step authentication guide, and examples of how to use the Forge APIs.

### Create an App
Create an app on the Forge Developer portal. Note the client ID and client secret.

### Authentication
This SDK comes with an [OAuth 2.0](https://developer.autodesk.com/en/docs/oauth/v2/overview/) client that allows you to
retrieve 2-legged and 3-legged tokens. It also enables you to refresh 3-legged tokens. The tutorial uses 2-legged
and 3-legged tokens for calling different Data Management endpoints.

#### 2-Legged Token

This type of token is given directly to the application.

To get a 2-legged token run the following code. Note that you need to replace `your-client-id` and `your-client-secret` with your [app](https://developer.autodesk.com/myapps)'s client ID and client secret.


```php
<?php

AutodeskForge\Core\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>');

$twoLeggedAuth = new AutodeskForge\Auth\OAuth2\TwoLeggedAuth();
$twoLeggedAuth->setScopes(['bucket:read']);

$twoLeggedAuth->fetchToken();

$tokenInfo = [
    'applicationToken' => $twoLeggedAuth->getAccessToken(),
    'expiry'           => time() + $twoLeggedAuth->getExpiresIn(),
];

```

#### 3-Legged Token
##### Generate an Authentication URL

To ask for permissions from a user to retrieve an access token, you
redirect the user to a consent page.

Replace `your-client-id`, `your-client-secret`, and `your-redirect-url` with your [app](https://developer.autodesk.com/myapps)'s client ID, client secret, and redirect URL, and run the code to create a consent page URL.

Note that the redirect URL must match the pattern of the callback URL field of the app’s registration in the My Apps section. The pattern may include wildcards after the hostname, allowing different redirect URL values to be specified in different parts of your app.

```php
<?php

AutodeskForge\Core\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>')
    ->setRedirectUrl('<your-redirect-url>');

$threeLeggedAuth = new AutodeskForge\Auth\OAuth2\ThreeLeggedAuth();
$threeLeggedAuth->addScope('code:all');

$authUrl = $threeLeggedAuth->createAuthUrl();

```

##### Retrieve an Authorization Code

Once a user receives permissions on the consent page, Forge will redirect
the page to the redirect URL you provided when you created the app. An authorization code is returned in the query string.

GET /callback?code={authorizationCode}

##### Retrieve an Access Token

Request an access token using the authorization code you received, as shown below:

```php
<?php

AutodeskForge\Core\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>')
    ->setRedirectUrl('<your-redirect-url>');

$threeLeggedAuth = new AutodeskForge\Auth\OAuth2\ThreeLeggedAuth();
$threeLeggedAuth->addScope('code:all');

$threeLeggedAuth->fetchToken($_GET['code']);

$userToken = [
    'accessToken'  => $threeLeggedAuth->getAccessToken(),
    'refreshToken' => $threeLeggedAuth->getRefreshToken(),
    'expiry'       => time() + $threeLeggedAuth->getExpiresIn(),
];

```

Note that access tokens expire after a short period of time. The `expires_in` field gives the validity of an access token in seconds.
To refresh your access token, call the `$threeLeggedAuth->refreshToken($refreshToken);` method.

#### Example API Calls

Use `TwoLeggedAuth` or `ThreeLeggedAuth` object to call the Forge APIs.

```php
<?php


$apiInstance = new AutodeskForge\Client\Api\ActivitiesApi($threeLeggedAuth);
$activity = new \AutodeskForge\Client\Model\Activity(); // \AutodeskForge\Client\Model\Activity

$result = $apiInstance->createActivity($activity);
```

## Documentation for API Endpoints

All URIs are relative to *https://developer.api.autodesk.com*

Class | Method | HTTP request | Description
------------ | ------------- | ------------- | -------------
*ActivitiesApi* | [**createActivity**](docs/Api/ActivitiesApi.md#createactivity) | **POST** /autocad.io/us-east/v2/Activities | Creates a new Activity.
*ActivitiesApi* | [**deleteActivity**](docs/Api/ActivitiesApi.md#deleteactivity) | **DELETE** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Removes a specific Activity.
*ActivitiesApi* | [**deleteActivityHistory**](docs/Api/ActivitiesApi.md#deleteactivityhistory) | **POST** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.DeleteHistory | Removes the version history of the specified Activity.
*ActivitiesApi* | [**getActivity**](docs/Api/ActivitiesApi.md#getactivity) | **GET** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Returns the details of a specific Activity.
*ActivitiesApi* | [**getActivityVersions**](docs/Api/ActivitiesApi.md#getactivityversions) | **GET** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.GetVersions | Returns all old versions of a specified Activity.
*ActivitiesApi* | [**getAllActivities**](docs/Api/ActivitiesApi.md#getallactivities) | **GET** /autocad.io/us-east/v2/Activities | Returns the details of all Activities.
*ActivitiesApi* | [**patchActivity**](docs/Api/ActivitiesApi.md#patchactivity) | **PATCH** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;) | Updates an Activity by specifying only the changed attributes.
*ActivitiesApi* | [**setActivityVersion**](docs/Api/ActivitiesApi.md#setactivityversion) | **POST** /autocad.io/us-east/v2/Activities(&#39;{id}&#39;)/Operations.SetVersion | Sets the Activity to the specified version.
*AppPackagesApi* | [**createAppPackage**](docs/Api/AppPackagesApi.md#createapppackage) | **POST** /autocad.io/us-east/v2/AppPackages | Creates an AppPackage module.
*AppPackagesApi* | [**deleteAppPackage**](docs/Api/AppPackagesApi.md#deleteapppackage) | **DELETE** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Removes a specific AppPackage.
*AppPackagesApi* | [**deleteAppPackageHistory**](docs/Api/AppPackagesApi.md#deleteapppackagehistory) | **POST** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.DeleteHistory | Removes the version history of the specified AppPackage.
*AppPackagesApi* | [**getAllAppPackages**](docs/Api/AppPackagesApi.md#getallapppackages) | **GET** /autocad.io/us-east/v2/AppPackages | Returns the details of all AppPackages.
*AppPackagesApi* | [**getAppPackage**](docs/Api/AppPackagesApi.md#getapppackage) | **GET** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Returns the details of a specific AppPackage.
*AppPackagesApi* | [**getAppPackageVersions**](docs/Api/AppPackagesApi.md#getapppackageversions) | **GET** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.GetVersions | Returns all old versions of a specified AppPackage.
*AppPackagesApi* | [**getUploadUrl**](docs/Api/AppPackagesApi.md#getuploadurl) | **GET** /autocad.io/us-east/v2/AppPackages/Operations.GetUploadUrl | Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage.
*AppPackagesApi* | [**getUploadUrlWithRequireContentType**](docs/Api/AppPackagesApi.md#getuploadurlwithrequirecontenttype) | **GET** /autocad.io/us-east/v2/AppPackages/Operations.GetUploadUrl(RequireContentType&#x3D;{require}) | Requests a pre-signed URL for uploading a zip file that contains the binaries for this AppPackage. Unlike the GetUploadUrl method that takes no parameters, this method allows the client to request that the pre-signed URL to be issued so that the subsequent HTTP PUT operation will require Content-Type&#x3D;binary/octet-stream.
*AppPackagesApi* | [**patchAppPackage**](docs/Api/AppPackagesApi.md#patchapppackage) | **PATCH** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Updates an AppPackage by specifying only the changed attributes.
*AppPackagesApi* | [**setAppPackageVersion**](docs/Api/AppPackagesApi.md#setapppackageversion) | **POST** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;)/Operations.SetVersion | Sets the AppPackage to the specified version.
*AppPackagesApi* | [**updateAppPackage**](docs/Api/AppPackagesApi.md#updateapppackage) | **PUT** /autocad.io/us-east/v2/AppPackages(&#39;{id}&#39;) | Updates an AppPackage by redefining the entire Activity object.
*BucketsApi* | [**createBucket**](docs/Api/BucketsApi.md#createbucket) | **POST** /oss/v2/buckets | 
*BucketsApi* | [**deleteBucket**](docs/Api/BucketsApi.md#deletebucket) | **DELETE** /oss/v2/buckets/{bucketKey} | 
*BucketsApi* | [**getBucketDetails**](docs/Api/BucketsApi.md#getbucketdetails) | **GET** /oss/v2/buckets/{bucketKey}/details | 
*BucketsApi* | [**getBuckets**](docs/Api/BucketsApi.md#getbuckets) | **GET** /oss/v2/buckets | 
*DerivativesApi* | [**deleteManifest**](docs/Api/DerivativesApi.md#deletemanifest) | **DELETE** /modelderivative/v2/designdata/{urn}/manifest | 
*DerivativesApi* | [**getDerivativeManifest**](docs/Api/DerivativesApi.md#getderivativemanifest) | **GET** /modelderivative/v2/designdata/{urn}/manifest/{derivativeUrn} | 
*DerivativesApi* | [**getFormats**](docs/Api/DerivativesApi.md#getformats) | **GET** /modelderivative/v2/designdata/formats | 
*DerivativesApi* | [**getManifest**](docs/Api/DerivativesApi.md#getmanifest) | **GET** /modelderivative/v2/designdata/{urn}/manifest | 
*DerivativesApi* | [**getMetadata**](docs/Api/DerivativesApi.md#getmetadata) | **GET** /modelderivative/v2/designdata/{urn}/metadata | 
*DerivativesApi* | [**getModelviewMetadata**](docs/Api/DerivativesApi.md#getmodelviewmetadata) | **GET** /modelderivative/v2/designdata/{urn}/metadata/{guid} | 
*DerivativesApi* | [**getModelviewProperties**](docs/Api/DerivativesApi.md#getmodelviewproperties) | **GET** /modelderivative/v2/designdata/{urn}/metadata/{guid}/properties | 
*DerivativesApi* | [**getThumbnail**](docs/Api/DerivativesApi.md#getthumbnail) | **GET** /modelderivative/v2/designdata/{urn}/thumbnail | 
*DerivativesApi* | [**translate**](docs/Api/DerivativesApi.md#translate) | **POST** /modelderivative/v2/designdata/job | 
*EnginesApi* | [**getAllEngines**](docs/Api/EnginesApi.md#getallengines) | **GET** /autocad.io/us-east/v2/Engines | Returns the details of all available AutoCAD core engines.
*EnginesApi* | [**getEngine**](docs/Api/EnginesApi.md#getengine) | **GET** /autocad.io/us-east/v2/Engines(&#39;{id}&#39;) | Returns the details of a specific AutoCAD core engine.
*FoldersApi* | [**getFolder**](docs/Api/FoldersApi.md#getfolder) | **GET** /data/v1/projects/{project_id}/folders/{folder_id} | 
*FoldersApi* | [**getFolderContents**](docs/Api/FoldersApi.md#getfoldercontents) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/contents | 
*FoldersApi* | [**getFolderParent**](docs/Api/FoldersApi.md#getfolderparent) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/parent | 
*FoldersApi* | [**getFolderRefs**](docs/Api/FoldersApi.md#getfolderrefs) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/refs | 
*FoldersApi* | [**getFolderRelationshipsRefs**](docs/Api/FoldersApi.md#getfolderrelationshipsrefs) | **GET** /data/v1/projects/{project_id}/folders/{folder_id}/relationships/refs | 
*FoldersApi* | [**postFolder**](docs/Api/FoldersApi.md#postfolder) | **POST** /data/v1/projects/{project_id}/folders | 
*FoldersApi* | [**postFolderRelationshipsRef**](docs/Api/FoldersApi.md#postfolderrelationshipsref) | **POST** /data/v1/projects/{project_id}/folders/{folder_id}/relationships/refs | 
*HubsApi* | [**getHub**](docs/Api/HubsApi.md#gethub) | **GET** /project/v1/hubs/{hub_id} | 
*HubsApi* | [**getHubs**](docs/Api/HubsApi.md#gethubs) | **GET** /project/v1/hubs | 
*ItemsApi* | [**getItem**](docs/Api/ItemsApi.md#getitem) | **GET** /data/v1/projects/{project_id}/items/{item_id} | 
*ItemsApi* | [**getItemParentFolder**](docs/Api/ItemsApi.md#getitemparentfolder) | **GET** /data/v1/projects/{project_id}/items/{item_id}/parent | 
*ItemsApi* | [**getItemRefs**](docs/Api/ItemsApi.md#getitemrefs) | **GET** /data/v1/projects/{project_id}/items/{item_id}/refs | 
*ItemsApi* | [**getItemRelationshipsRefs**](docs/Api/ItemsApi.md#getitemrelationshipsrefs) | **GET** /data/v1/projects/{project_id}/items/{item_id}/relationships/refs | 
*ItemsApi* | [**getItemTip**](docs/Api/ItemsApi.md#getitemtip) | **GET** /data/v1/projects/{project_id}/items/{item_id}/tip | 
*ItemsApi* | [**getItemVersions**](docs/Api/ItemsApi.md#getitemversions) | **GET** /data/v1/projects/{project_id}/items/{item_id}/versions | 
*ItemsApi* | [**postItem**](docs/Api/ItemsApi.md#postitem) | **POST** /data/v1/projects/{project_id}/items | 
*ItemsApi* | [**postItemRelationshipsRef**](docs/Api/ItemsApi.md#postitemrelationshipsref) | **POST** /data/v1/projects/{project_id}/items/{item_id}/relationships/refs | 
*ObjectsApi* | [**copyTo**](docs/Api/ObjectsApi.md#copyto) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName}/copyto/{newObjName} | 
*ObjectsApi* | [**createSignedResource**](docs/Api/ObjectsApi.md#createsignedresource) | **POST** /oss/v2/buckets/{bucketKey}/objects/{objectName}/signed | 
*ObjectsApi* | [**deleteObject**](docs/Api/ObjectsApi.md#deleteobject) | **DELETE** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
*ObjectsApi* | [**deleteSignedResource**](docs/Api/ObjectsApi.md#deletesignedresource) | **DELETE** /oss/v2/signedresources/{id} | 
*ObjectsApi* | [**getObject**](docs/Api/ObjectsApi.md#getobject) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
*ObjectsApi* | [**getObjectDetails**](docs/Api/ObjectsApi.md#getobjectdetails) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName}/details | 
*ObjectsApi* | [**getObjects**](docs/Api/ObjectsApi.md#getobjects) | **GET** /oss/v2/buckets/{bucketKey}/objects | 
*ObjectsApi* | [**getSignedResource**](docs/Api/ObjectsApi.md#getsignedresource) | **GET** /oss/v2/signedresources/{id} | 
*ObjectsApi* | [**getStatusBySessionId**](docs/Api/ObjectsApi.md#getstatusbysessionid) | **GET** /oss/v2/buckets/{bucketKey}/objects/{objectName}/status/{sessionId} | 
*ObjectsApi* | [**uploadChunk**](docs/Api/ObjectsApi.md#uploadchunk) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName}/resumable | 
*ObjectsApi* | [**uploadObject**](docs/Api/ObjectsApi.md#uploadobject) | **PUT** /oss/v2/buckets/{bucketKey}/objects/{objectName} | 
*ObjectsApi* | [**uploadSignedResource**](docs/Api/ObjectsApi.md#uploadsignedresource) | **PUT** /oss/v2/signedresources/{id} | 
*ObjectsApi* | [**uploadSignedResourcesChunk**](docs/Api/ObjectsApi.md#uploadsignedresourceschunk) | **PUT** /oss/v2/signedresources/{id}/resumable | 
*ProjectsApi* | [**getHubProjects**](docs/Api/ProjectsApi.md#gethubprojects) | **GET** /project/v1/hubs/{hub_id}/projects | 
*ProjectsApi* | [**getProject**](docs/Api/ProjectsApi.md#getproject) | **GET** /project/v1/hubs/{hub_id}/projects/{project_id} | 
*ProjectsApi* | [**getProjectHub**](docs/Api/ProjectsApi.md#getprojecthub) | **GET** /project/v1/hubs/{hub_id}/projects/{project_id}/hub | 
*ProjectsApi* | [**getProjectTopFolders**](docs/Api/ProjectsApi.md#getprojecttopfolders) | **GET** /project/v1/hubs/{hub_id}/projects/{project_id}/topFolders | 
*ProjectsApi* | [**postStorage**](docs/Api/ProjectsApi.md#poststorage) | **POST** /data/v1/projects/{project_id}/storage | 
*UserProfileApi* | [**getUserProfile**](docs/Api/UserProfileApi.md#getuserprofile) | **GET** /userprofile/v1/users/@me | Returns the profile information of an authorizing end user.
*VersionsApi* | [**getVersion**](docs/Api/VersionsApi.md#getversion) | **GET** /data/v1/projects/{project_id}/versions/{version_id} | 
*VersionsApi* | [**getVersionItem**](docs/Api/VersionsApi.md#getversionitem) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/item | 
*VersionsApi* | [**getVersionRefs**](docs/Api/VersionsApi.md#getversionrefs) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/refs | 
*VersionsApi* | [**getVersionRelationshipsRefs**](docs/Api/VersionsApi.md#getversionrelationshipsrefs) | **GET** /data/v1/projects/{project_id}/versions/{version_id}/relationships/refs | 
*VersionsApi* | [**postVersion**](docs/Api/VersionsApi.md#postversion) | **POST** /data/v1/projects/{project_id}/versions | 
*VersionsApi* | [**postVersionRelationshipsRef**](docs/Api/VersionsApi.md#postversionrelationshipsref) | **POST** /data/v1/projects/{project_id}/versions/{version_id}/relationships/refs | 
*WorkItemsApi* | [**createWorkItem**](docs/Api/WorkItemsApi.md#createworkitem) | **POST** /autocad.io/us-east/v2/WorkItems | Creates a new WorkItem.
*WorkItemsApi* | [**deleteWorkItem**](docs/Api/WorkItemsApi.md#deleteworkitem) | **DELETE** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Removes a specific WorkItem.
*WorkItemsApi* | [**getAllWorkItems**](docs/Api/WorkItemsApi.md#getallworkitems) | **GET** /autocad.io/us-east/v2/WorkItems | Returns the details of all WorkItems.
*WorkItemsApi* | [**getWorkItem**](docs/Api/WorkItemsApi.md#getworkitem) | **GET** /autocad.io/us-east/v2/WorkItems(&#39;{id}&#39;) | Returns the details of a specific WorkItem.


## Documentation For Models

 - [Activity](docs/Model/Activity.md)
 - [ActivityOptional](docs/Model/ActivityOptional.md)
 - [ActivityVersion](docs/Model/ActivityVersion.md)
 - [AppPackage](docs/Model/AppPackage.md)
 - [AppPackageOptional](docs/Model/AppPackageOptional.md)
 - [AppPackageVersion](docs/Model/AppPackageVersion.md)
 - [BadInput](docs/Model/BadInput.md)
 - [BaseAttributesCreatedUpdated](docs/Model/BaseAttributesCreatedUpdated.md)
 - [BaseAttributesCreatedUpdatedAttributes](docs/Model/BaseAttributesCreatedUpdatedAttributes.md)
 - [BaseAttributesExtensionObject](docs/Model/BaseAttributesExtensionObject.md)
 - [BaseAttributesExtensionObjectWithoutSchemaLink](docs/Model/BaseAttributesExtensionObjectWithoutSchemaLink.md)
 - [Bucket](docs/Model/Bucket.md)
 - [BucketObjects](docs/Model/BucketObjects.md)
 - [Buckets](docs/Model/Buckets.md)
 - [BucketsItems](docs/Model/BucketsItems.md)
 - [Conflict](docs/Model/Conflict.md)
 - [CreateItem](docs/Model/CreateItem.md)
 - [CreateItemData](docs/Model/CreateItemData.md)
 - [CreateItemDataRelationships](docs/Model/CreateItemDataRelationships.md)
 - [CreateItemDataRelationshipsTip](docs/Model/CreateItemDataRelationshipsTip.md)
 - [CreateItemDataRelationshipsTipData](docs/Model/CreateItemDataRelationshipsTipData.md)
 - [CreateItemIncluded](docs/Model/CreateItemIncluded.md)
 - [CreateItemRelationships](docs/Model/CreateItemRelationships.md)
 - [CreateItemRelationshipsStorage](docs/Model/CreateItemRelationshipsStorage.md)
 - [CreateItemRelationshipsStorageData](docs/Model/CreateItemRelationshipsStorageData.md)
 - [CreateRef](docs/Model/CreateRef.md)
 - [CreateRefData](docs/Model/CreateRefData.md)
 - [CreateRefDataMeta](docs/Model/CreateRefDataMeta.md)
 - [CreateStorage](docs/Model/CreateStorage.md)
 - [CreateStorageData](docs/Model/CreateStorageData.md)
 - [CreateStorageDataAttributes](docs/Model/CreateStorageDataAttributes.md)
 - [CreateStorageDataRelationships](docs/Model/CreateStorageDataRelationships.md)
 - [CreateStorageDataRelationshipsTarget](docs/Model/CreateStorageDataRelationshipsTarget.md)
 - [CreateVersion](docs/Model/CreateVersion.md)
 - [CreateVersionData](docs/Model/CreateVersionData.md)
 - [CreateVersionDataRelationships](docs/Model/CreateVersionDataRelationships.md)
 - [CreateVersionDataRelationshipsItem](docs/Model/CreateVersionDataRelationshipsItem.md)
 - [CreateVersionDataRelationshipsItemData](docs/Model/CreateVersionDataRelationshipsItemData.md)
 - [DesignAutomationActivities](docs/Model/DesignAutomationActivities.md)
 - [DesignAutomationAppPackages](docs/Model/DesignAutomationAppPackages.md)
 - [DesignAutomationEngines](docs/Model/DesignAutomationEngines.md)
 - [DesignAutomationWorkItems](docs/Model/DesignAutomationWorkItems.md)
 - [Diagnostics](docs/Model/Diagnostics.md)
 - [Engine](docs/Model/Engine.md)
 - [Folder](docs/Model/Folder.md)
 - [FolderAttributes](docs/Model/FolderAttributes.md)
 - [FolderRelationships](docs/Model/FolderRelationships.md)
 - [Forbidden](docs/Model/Forbidden.md)
 - [Formats](docs/Model/Formats.md)
 - [FormatsFormats](docs/Model/FormatsFormats.md)
 - [Hub](docs/Model/Hub.md)
 - [HubAttributes](docs/Model/HubAttributes.md)
 - [HubRelationships](docs/Model/HubRelationships.md)
 - [Hubs](docs/Model/Hubs.md)
 - [Item](docs/Model/Item.md)
 - [ItemAttributes](docs/Model/ItemAttributes.md)
 - [ItemCreated](docs/Model/ItemCreated.md)
 - [ItemRelationships](docs/Model/ItemRelationships.md)
 - [Job](docs/Model/Job.md)
 - [JobAcceptedJobs](docs/Model/JobAcceptedJobs.md)
 - [JobIgesOutputPayload](docs/Model/JobIgesOutputPayload.md)
 - [JobIgesOutputPayloadAdvanced](docs/Model/JobIgesOutputPayloadAdvanced.md)
 - [JobObjOutputPayload](docs/Model/JobObjOutputPayload.md)
 - [JobObjOutputPayloadAdvanced](docs/Model/JobObjOutputPayloadAdvanced.md)
 - [JobPayload](docs/Model/JobPayload.md)
 - [JobPayloadInput](docs/Model/JobPayloadInput.md)
 - [JobPayloadItem](docs/Model/JobPayloadItem.md)
 - [JobPayloadOutput](docs/Model/JobPayloadOutput.md)
 - [JobStepOutputPayload](docs/Model/JobStepOutputPayload.md)
 - [JobStepOutputPayloadAdvanced](docs/Model/JobStepOutputPayloadAdvanced.md)
 - [JobStlOutputPayload](docs/Model/JobStlOutputPayload.md)
 - [JobStlOutputPayloadAdvanced](docs/Model/JobStlOutputPayloadAdvanced.md)
 - [JobSvfOutputPayload](docs/Model/JobSvfOutputPayload.md)
 - [JobThumbnailOutputPayload](docs/Model/JobThumbnailOutputPayload.md)
 - [JobThumbnailOutputPayloadAdvanced](docs/Model/JobThumbnailOutputPayloadAdvanced.md)
 - [JsonApiAttributes](docs/Model/JsonApiAttributes.md)
 - [JsonApiCollection](docs/Model/JsonApiCollection.md)
 - [JsonApiDocument](docs/Model/JsonApiDocument.md)
 - [JsonApiDocumentBase](docs/Model/JsonApiDocumentBase.md)
 - [JsonApiError](docs/Model/JsonApiError.md)
 - [JsonApiErrorErrors](docs/Model/JsonApiErrorErrors.md)
 - [JsonApiErrorLinks](docs/Model/JsonApiErrorLinks.md)
 - [JsonApiLink](docs/Model/JsonApiLink.md)
 - [JsonApiLinks](docs/Model/JsonApiLinks.md)
 - [JsonApiLinksPaging](docs/Model/JsonApiLinksPaging.md)
 - [JsonApiLinksRelated](docs/Model/JsonApiLinksRelated.md)
 - [JsonApiLinksSelf](docs/Model/JsonApiLinksSelf.md)
 - [JsonApiMeta](docs/Model/JsonApiMeta.md)
 - [JsonApiMetaLink](docs/Model/JsonApiMetaLink.md)
 - [JsonApiRelationships](docs/Model/JsonApiRelationships.md)
 - [JsonApiRelationshipsLinksExternalResource](docs/Model/JsonApiRelationshipsLinksExternalResource.md)
 - [JsonApiRelationshipsLinksInternal](docs/Model/JsonApiRelationshipsLinksInternal.md)
 - [JsonApiRelationshipsLinksInternalResource](docs/Model/JsonApiRelationshipsLinksInternalResource.md)
 - [JsonApiRelationshipsLinksRefs](docs/Model/JsonApiRelationshipsLinksRefs.md)
 - [JsonApiRelationshipsLinksRefsLinks](docs/Model/JsonApiRelationshipsLinksRefsLinks.md)
 - [JsonApiResource](docs/Model/JsonApiResource.md)
 - [JsonApiTypeId](docs/Model/JsonApiTypeId.md)
 - [JsonApiVersion](docs/Model/JsonApiVersion.md)
 - [JsonApiVersionJsonapi](docs/Model/JsonApiVersionJsonapi.md)
 - [Manifest](docs/Model/Manifest.md)
 - [ManifestChildren](docs/Model/ManifestChildren.md)
 - [ManifestDerivative](docs/Model/ManifestDerivative.md)
 - [Message](docs/Model/Message.md)
 - [Messages](docs/Model/Messages.md)
 - [Metadata](docs/Model/Metadata.md)
 - [MetadataCollection](docs/Model/MetadataCollection.md)
 - [MetadataData](docs/Model/MetadataData.md)
 - [MetadataMetadata](docs/Model/MetadataMetadata.md)
 - [MetadataObject](docs/Model/MetadataObject.md)
 - [NotFound](docs/Model/NotFound.md)
 - [ObjectDetails](docs/Model/ObjectDetails.md)
 - [ObjectFullDetails](docs/Model/ObjectFullDetails.md)
 - [ObjectFullDetailsDeltas](docs/Model/ObjectFullDetailsDeltas.md)
 - [Permission](docs/Model/Permission.md)
 - [PostBucketsPayload](docs/Model/PostBucketsPayload.md)
 - [PostBucketsPayloadAllow](docs/Model/PostBucketsPayloadAllow.md)
 - [PostBucketsSigned](docs/Model/PostBucketsSigned.md)
 - [PostObjectSigned](docs/Model/PostObjectSigned.md)
 - [Project](docs/Model/Project.md)
 - [ProjectAttributes](docs/Model/ProjectAttributes.md)
 - [ProjectRelationships](docs/Model/ProjectRelationships.md)
 - [Projects](docs/Model/Projects.md)
 - [Reason](docs/Model/Reason.md)
 - [Refs](docs/Model/Refs.md)
 - [RelRef](docs/Model/RelRef.md)
 - [RelRefMeta](docs/Model/RelRefMeta.md)
 - [ResourceId](docs/Model/ResourceId.md)
 - [Result](docs/Model/Result.md)
 - [Storage](docs/Model/Storage.md)
 - [StorageCreated](docs/Model/StorageCreated.md)
 - [StorageRelationships](docs/Model/StorageRelationships.md)
 - [StorageRelationshipsTarget](docs/Model/StorageRelationshipsTarget.md)
 - [StorageRelationshipsTargetData](docs/Model/StorageRelationshipsTargetData.md)
 - [TopFolders](docs/Model/TopFolders.md)
 - [UserProfile](docs/Model/UserProfile.md)
 - [UserProfileProfileImages](docs/Model/UserProfileProfileImages.md)
 - [Version](docs/Model/Version.md)
 - [VersionAttributes](docs/Model/VersionAttributes.md)
 - [VersionCreated](docs/Model/VersionCreated.md)
 - [VersionRelationships](docs/Model/VersionRelationships.md)
 - [Versions](docs/Model/Versions.md)
 - [WorkItem](docs/Model/WorkItem.md)
 - [WorkItemResp](docs/Model/WorkItemResp.md)


## Documentation For Authorization


## oauth2_access_code

- **Type**: OAuth
- **Flow**: accessCode
- **Authorization URL**: /authentication/v1/authorize
- **Scopes**: 
 - **data:read**: The application will be able to read the end user’s data within the Autodesk ecosystem.
 - **data:write**: The application will be able to create, update, and delete data on behalf of the end user within the Autodesk ecosystem.
 - **data:create**: The application will be able to create data on behalf of the end user within the Autodesk ecosystem.
 - **data:search**: The application will be able to search the end user’s data within the Autodesk ecosystem.
 - **bucket:create**: The application will be able to create an OSS bucket it will own.
 - **bucket:read**: The application will be able to read the metadata and list contents for OSS buckets that it has access to.
 - **bucket:update**: The application will be able to set permissions and entitlements for OSS buckets that it has permission to modify.
 - **bucket:delete**: The application will be able to delete a bucket that it has permission to delete.
 - **code:all**: The application will be able to author and execute code on behalf of the end user (e.g., scripts processed by the Design Automation API).
 - **account:read**: For Product APIs, the application will be able to read the account data the end user has entitlements to.
 - **account:write**: For Product APIs, the application will be able to update the account data the end user has entitlements to.
 - **user-profile:read**: The application will be able to read the end user’s profile data.

## oauth2_application

- **Type**: OAuth
- **Flow**: application
- **Authorization URL**: 
- **Scopes**: 
 - **data:read**: The application will be able to read the end user’s data within the Autodesk ecosystem.
 - **data:write**: The application will be able to create, update, and delete data on behalf of the end user within the Autodesk ecosystem.
 - **data:create**: The application will be able to create data on behalf of the end user within the Autodesk ecosystem.
 - **data:search**: The application will be able to search the end user’s data within the Autodesk ecosystem.
 - **bucket:create**: The application will be able to create an OSS bucket it will own.
 - **bucket:read**: The application will be able to read the metadata and list contents for OSS buckets that it has access to.
 - **bucket:update**: The application will be able to set permissions and entitlements for OSS buckets that it has permission to modify.
 - **bucket:delete**: The application will be able to delete a bucket that it has permission to delete.
 - **code:all**: The application will be able to author and execute code on behalf of the end user (e.g., scripts processed by the Design Automation API).
 - **account:read**: For Product APIs, the application will be able to read the account data the end user has entitlements to.
 - **account:write**: For Product APIs, the application will be able to update the account data the end user has entitlements to.
 - **user-profile:read**: The application will be able to read the end user’s profile data.


## Author

forge.help@autodesk.com


