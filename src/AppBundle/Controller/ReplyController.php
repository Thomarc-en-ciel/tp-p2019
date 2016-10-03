<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reply;
use AppBundle\Entity\Subject;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route(path="/subjects")
 */
class ReplyController extends Controller
{
    /**
     * @Route(path="/{id}/reply/vote/up", methods={"GET"}, name="reply_upvote")
     * @Template()
     */
    public function voteupreplyAction($id)
    { 
      $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
      $votereply = $reply->getVotereply();
      $votereply = $votereply + 1;
      $reply->setVotereply($votereply);
      $this->getDoctrine()->getManager()->flush();
      return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId() ]);
    }
    
    /**
     * @Route(path="/{id}/reply/vote/down", methods={"GET"}, name="reply_downvote")
     * @Template()
     */
    public function votedownreplyAction($id)
    {
      $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
      $votereply = $reply->getVotereply();
      $votereply = $votereply - 1;
      $reply->setVotereply($votereply);
      $this->getDoctrine()->getManager()->flush();
      return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId() ]);
    }
    
    /** 
     * @Route(path="/{id}/delete", methods={"GET"}, name="reply_delete")
     * @Template()
     */
    public function replydeleteAction($id)
    {
        $reply = $this->getDoctrine()->getRepository(Reply::class)->find($id);
        $deleteReply = $this->getDoctrine()->getManager();
        $deleteReply->remove($reply);
        $deleteReply->flush();

       return $this->redirectToRoute("subject_single", [ 'id' => $reply->getSubject()->getId() ]);
    }
}