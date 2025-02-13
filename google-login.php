<?php
session_start();
require_once 'vendor/autoload.php';

$client = new Google_Client();
$client->setClientId('1087754784529-dtaf23c94tkp0uolq8qng0096i15t7fo.apps.googleusercontent.com');
$client->setClientSecret('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');
$client->setRedirectUri('http://localhost/WeatherView/google-login.php');
$client->addScope("email");
$client->addScope("profile");

if (!isset($_GET['code'])) {
    header('Location: ' . $client->createAuthUrl());
    exit;
}

$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
$client->setAccessToken($token);

$google_service = new Google_Service_Oauth2($client);
$data = $google_service->userinfo->get();

$_SESSION['user_name'] = $data->name;
header('Location: index.php');
