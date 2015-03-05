<?php


/**
 * Created by PhpStorm.
 * User: bigtallbill
 * Date: 05/02/15
 * Time: 21:04
 */

$url = '';
$knowledge = json_decode(file_get_contents(__DIR__ . '/knowledge.json'), true);

/**
 * @param $url
 * @param $params
 * @return mixed
 */
function post($url, $params) {
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));

  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

  $server_output = curl_exec($ch);

  curl_close($ch);
  return $server_output;
}

$key = array_rand($knowledge);
$rand = $knowledge[$key];


$payload = array(
  'username' => 'Spire',
  'icon_emoji' => ':zoidberg:',
  'text' => $rand['text'],
  "fallback" => $rand['text'],
  "pretext" => "<{$rand['link']}|" . $rand['title'] . ">",
  "color" => "good"
);

var_dump(post($url, array('payload' => json_encode($payload))));
