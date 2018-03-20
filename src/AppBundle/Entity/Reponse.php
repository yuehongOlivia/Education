<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reponse
 *
 * @ORM\Table(name="reponse")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ReponseRepository")
 */
class Reponse
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Question
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Question",inversedBy="reponse")
     * @ORM\JoinColumn(name="question_id",referencedColumnName="id")
     */
    private $question;

    /**
     * @var string
     *
     * @ORM\Column(name="resultat", type="string", length=255)
     */
    private $resultat;


    public function __toString()
    {
        return $this->getResultat();
        // TODO: Implement __toString() method.
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set question
     *
     * @param Question $question
     *
     * @return Question
     */
    public function setQuestion(Question $question)
    {
       return  $this->question = $question;

    }


    /**
     * Get question
     *
     *@return string

     */
    public function getQuestion()
    {
        return $this->question;
    }


    /**
     * Set resultat
     *
     * @param string $resultat
     *
     * @return Reponse
     */
    public function setResultat($resultat)
    {
        $this->resultat = $resultat;

        return $this;
    }

    /**
     * Get resultat
     *
     * @return string
     */
    public function getResultat()
    {
        return $this->resultat;
    }
}
