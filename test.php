<?php

$user = 'suryametla';
$token = '97add82a560b5f700b9cef09087f120ecd61f5ff';
$mergeBranch = 'test3';

$cmd = <<<poop
curl -i -H 'Authorization: token %s' https://api.github.com/repos/%s/test/merges -d '{"base":"master","head":"%s","commit_message":"Shipped branch_test!!!"}'

poop;


$cmd = sprintf($cmd, $token, $user, $mergeBranch);

$output = shell_exec($cmd);

print_r($output);

if (!empty($output)) {
    // now you could just foreach the repos and show them
    foreach ($output as $repo) {
      print $repo->commit->message;
    }
  }