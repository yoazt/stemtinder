<?php

class ResultsController extends Controller {

  function create($parameters) {
    $resultParams = $parameters['result'];

    $result = new Result();
    $result->setRemoteIp($_SERVER['REMOTE_ADDR']);
    $result->setProvince($resultParams['province']);
    $this->em->persist($result);

    foreach ($resultParams['votes'] as $candidateId => $voteString) {
      $vote = new Vote();
      $vote->setResult($result);
      $vote->setCandidate($this->em->getReference('Candidate', $candidateId));
      $vote->setVote($voteString);
      $this->em->persist($vote);
    }

    $this->em->flush();

    return array('status' => 'ok');
  }

}