<!DOCTYPE html>
<html>
<head>
  <title>
    My Name 
  </title>
</head>

<body>
  <h1>Get My Name from Facebook</h1>

<?php

require_once __DIR__ . '/vendor/autoload.php';   

$fb = new \Facebook\Facebook([
  'app_id' => '{579991926006784}',           //Replace {your-app-id} with your app ID
  'app_secret' => '{04c79888ea8379e6d30da9486d4e26b8}',   //Replace {your-app-secret} with your app secret
  'graph_api_version' => 'v8.0',
]);


try {
   
// Get your UserNode object, replace {access-token} with your token
  $response = $fb->get('/me', '{EAAIPfZBS45AABAEcq85ZCPfxjmLJPlpRVAHN30OZCFgl9GftaRPqW4TZAhQ27yRjKioB6jO7nuDWLftKxbQrM5INZAvGYOBbM2VcmFa5w57twVZBVivHMz0vXMC00DBziXQS101Ekev5ZAJHBGU9nrKsv348eUfqOf7Xh8sELRnEZApumu8NZCmWhVkeZB7r7fZCmFNrKDPYvLY7PtLJtY8fCz8HbFxk8RlexrA84dqyNyucwZDZD}');

} catch(\Facebook\Exceptions\FacebookResponseException $e) {
        // Returns Graph API errors when they occur
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(\Facebook\Exceptions\FacebookSDKException $e) {
        // Returns SDK errors when validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$me = $response->getGraphUser();

       //All that is returned in the response
echo 'All the data returned from the Facebook server: ' . $me;

       //Print out my name
echo 'My name is ' . $me->getName();

?>

</body>
</html>