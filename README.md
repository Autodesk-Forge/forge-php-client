# Forge PHP SDK

*Forge API*:
[![oAuth2](https://img.shields.io/badge/oAuth2-v1-green.svg)](http://autodesk-forge.github.io/)
[![Data-Management](https://img.shields.io/badge/Data%20Management-v1-green.svg)](http://autodesk-forge.github.io/)
[![OSS](https://img.shields.io/badge/OSS-v2-green.svg)](http://autodesk-forge.github.io/)
[![Model-Derivative](https://img.shields.io/badge/Model%20Derivative-v2-green.svg)](http://autodesk-forge.github.io/)

## Overview
This [PHP](http://php.net/) SDK enables you to easily integrate the Forge REST APIs
into your application, including [OAuth](https://developer.autodesk.com/en/docs/oauth/v2/overview/),
[Data Management](https://developer.autodesk.com/en/docs/data/v2/overview/),
[Model Derivative](https://developer.autodesk.com/en/docs/model-derivative/v2/overview/),
and [Design Automation](https://developer.autodesk.com/en/docs/design-automation/v2/overview/).

### Requirements
* PHP version 5.4.0 and above.
* A registered app on the [Forge Developer portal](https://developer.autodesk.com/myapps).

### Installation
#### Composer

To install the bindings via [Composer](http://getcomposer.org/), run:
```
composer require autodesk/forge-client
```

#### Manual Installation

Download the files and include `autoload.php`:

```php
require_once('/path/to/ForgeClient/autoload.php');
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

Autodesk\Auth\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>');

$twoLeggedAuth = new Autodesk\Auth\OAuth2\TwoLeggedAuth();
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

Note that the redirect URL must match the callback URL you provided when you created the app.

```php
<?php

Autodesk\Auth\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>')
    ->setRedirectUrl('<your-redirect-url>');

$threeLeggedAuth = new Autodesk\Auth\OAuth2\ThreeLeggedAuth();
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

Autodesk\Auth\Configuration::getDefaultConfiguration()
    ->setClientId('<your-client-id>')
    ->setClientSecret('<your-client-secret>')
    ->setRedirectUrl('<your-redirect-url>');

$threeLeggedAuth = new Autodesk\Auth\OAuth2\ThreeLeggedAuth();
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

Use the `TwoLeggedAuth` object or the `ThreeLeggedAuth` object to call the Forge APIs.

```php
<?php


$apiInstance = new Autodesk\Forge\Client\Api\ActivitiesApi($threeLeggedAuth);
$activity = new \Autodesk\Forge\Client\Model\Activity(); // \Autodesk\Forge\Client\Model\Activity

$result = $apiInstance->createActivity($activity);
```

## API Documentation

You can get the full documentation for the API on the [Developer Portal](https://developer.autodesk.com/)

### Documentation for API Endpoints

All URIs are relative to https://developer.api.autodesk.com. For example, the *createActivity* URI is 'https://developer.api.autodesk.com/autocad.io/us-east/v2/Activities'.


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

### Thumbnail

![thumbnail](/php.png)


## Support

forge.help@autodesk.com
