
<?php
 
class EbayAPI
{
    protected $devID;
    protected $appID;
    protected $certID;
    protected $clientID;
    protected $serverUrl;
    public $userToken;
    protected $paypalEmailAddress;
    protected $ruName;
 
 
    public function __construct()
    {
        $this->devID = '5ee02552-92f0-484a-8e71-da0da5fd2e4d'; // these prod keys are different from sandbox keys
        $this->appID = 'HasanNaq-exportqu-SBX-c196809ca-c47d719d';
        $this->certID = 'SBX-196809ca1215-9fbd-4c9d-8e10-e1a7';
        $this->clientID = 'HasanNaq-exportqu-SBX-c196809ca-c47d719d';
        //set the Server to use (Sandbox or Production)
        $this->serverUrl = 'https://api.ebay.com/ws/api.dll';      // server URL different for prod and sandbox
        //the token representing the eBay user to assign the call with
 
        $this->authCode = 'AgAAAA**AQAAAA**aAAAAA**sLeUXg**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4aiCpmAqQSdj6x9nY+seQ**TjgFAA**AAMAAA**xrAg4wG4Qy9jwaIBpRyEcBchg75XM/MIt3ocW/CH0U8TdjEix7645EYovoizdh1Wh9+I+DsovCvoBfWqug28JG2jN9bKqpMDtqeqHuuERimU6Q44MaoXg4ZKuZzF1x55tE/+JgvhZlEYimGvDSnclZgcg3yiDXJPCiopD6jketzuZK1wW3qzFoAX8yq3+ORtT7cJnZpaHgJyarVlCAwzE6uWzqzqpXWCMdY0lqjYo3Yiy3nblBwadfNtiTDJ10JE97N74A69hN/Ie6Q+4/5pGJmpSABGELfQmXfsL38oDuu/5xMEXPPdZ3muxjd4E34tbQlB08C/6PuPkv/IGCuV7Tq4NEqhtm1BJKa5gyEyQY2kHQ73PScMgXrtiVNGVd02aoT9tPsZI4qIMoQ8Uh1ieyDspwJ9yDWO18sVpx8i2S/GxDbyMRdnVR9bU9VV4MVu8y191vRX1CANz1Dn4WjkXNnyV2C1tI8P9j9lO8IXer0jMLSbxlvMeL42JASmMtOiy14VL5+8i1TIKeifsBRGCf7wqDx1lpnyQgo3IvHfIG8B31Qv2VEN92kRFnSkiVEzxK865EMwS3dCrcvbYB1O7Gn5q4uiQAEGWk/BtqKwaQ9yt8FBXMNCWPesKpupbR2vftqgsGfB27scdovvmiLef6cJBSaYu0YN7xkMNHLrKe6sqhp8oIQejKUJODWRYlwyxHBPQADb+UCdhwCPa2E6coJj8b93YKoHaIPy61UT9VEXmWfmyfGWKmj69oVdPb2k';
        $this->authToken ="";
        $this->refreshToken ="";
        $this->ruName= "Hasan_Naqvi-HasanNaq-export-nkpcywbv";
 
        $this->paypalEmailAddress= 'PAYPAL_EMAIL_ADDRESS';
         
    }
 
    public function firstAuthAppToken() {
        $url = "https://auth.ebay.com/oauth2/authorize?client_id=".$this->clientID."&amp;response_type=code&amp;redirect_uri=".$this->ruName."&amp;scope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly";
		return $url;     
    }
 
    public function authorizationToken()
    {
        $link = "https://api.ebay.com/identity/v1/oauth2/token";
        $codeAuth = base64_encode($this->clientID.':'.$this->certID);
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Basic '.$codeAuth
        ));
        curl_setopt($ch, CURLHEADER_SEPARATE, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=authorization_code&amp;code=".$this->authCode."&amp;redirect_uri=".$this->ruName);
        $response = curl_exec($ch);
        var_dump($response);
        exit();
        $json = json_decode($response, true);
        $info = curl_getinfo($ch);
        curl_close($ch);
        if($json != null)
        {
        	return $json;
           // return  $this->authToken = $json["access_token"];
            // $this->refreshToken = $json["refresh_token"];
        }
    }
 
    // public function refreshToken()
    // {
    //     $link = "https://api.ebay.com/identity/v1/oauth2/token";
    //     $codeAuth = base64_encode($this->clientID.':'.$this->certID);
    //     $ch = curl_init($link);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //         'Content-Type: application/x-www-form-urlencoded',
    //         'Authorization: Basic '.$codeAuth
    //     ));
    //     echo $this->refreshToken;
    //     curl_setopt($ch, CURLHEADER_SEPARATE, true);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //     curl_setopt($ch, CURLOPT_POST, 1);
    //     curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&amp;refresh_token=".$this->refreshToken."&amp;scope=https://api.ebay.com/oauth/api_scope https://api.ebay.com/oauth/api_scope/sell.marketing.readonly https://api.ebay.com/oauth/api_scope/sell.marketing https://api.ebay.com/oauth/api_scope/sell.inventory.readonly https://api.ebay.com/oauth/api_scope/sell.inventory https://api.ebay.com/oauth/api_scope/sell.account.readonly https://api.ebay.com/oauth/api_scope/sell.account https://api.ebay.com/oauth/api_scope/sell.fulfillment.readonly https://api.ebay.com/oauth/api_scope/sell.fulfillment https://api.ebay.com/oauth/api_scope/sell.analytics.readonly");
    //     $response = curl_exec($ch);
    //     $json = json_decode($response, true);
    //     $info = curl_getinfo($ch);
    //     curl_close($ch);
    //     if($json != null)
    //     {
    //         $this->authToken = $json["access_token"];
    //     }
    // }
}


	$ebay = new EbayAPI();

	echo $ebay->authorizationToken();