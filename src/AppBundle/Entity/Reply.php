<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table()
 */

class Reply
{
    /**
    * @ORM\Id()
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    *
    * @var int
    */
    private $id;
    
    /**
    * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkHost = true,
     *     checkMX = true
     *)
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $authorEmail;
    
    /**
    *@Assert\NotBlank()
    * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Your first name must be at least {{ limit }} characters long",
     *      maxMessage = "Your first name cannot be longer than {{ limit }} characters"
     * )
     * @ORM\Column(type="string")
     *
     * @var string
     */
    private $author;
    
    /**
    *@Assert\NotBlank()
     * @ORM\Column(type="text")
     *
     * @var string
     */
    private $comment;
    
    /**
     * @ORM\Column(type="integer")
     *
     * @var int
     */
    private $votereply;
    
    /**
    *@ORM\ManyToOne(targetEntity="Subject", inversedBy="replies")
    */
    private $subject;
    
    
    public function __construct()
    {
        $this->votereply  = 0;
    }
    
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return text
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param text $description
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }
    
    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }

    /**
     * @param string $author
     */
    public function setAuthorEmail($authorEmail)
    {
        $this->authorEmail = $authorEmail;
    }
    
    /**
     * @return int
     */
    public function getVotereply()
    {
        return $this->votereply;
    }
    
    /**
     * @param int $votereply
     */
    public function setVotereply($votereply)
    {
        $this->votereply = $votereply;
    }
    
    /**
     * @return Subject
     */
    public function getSubject()
    {
        return $this->subject;
    }
    
    /**
     * @param Subject $subject
     */
    public function setSubject(Subject $subject)
    {
        $this->subject = $subject;
    }
}