<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Etudiant
 *
 * @ORM\Table(name="etudiant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EtudiantRepository")
 */
class Etudiant
{
    /**
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     *
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="INE", type="string", length=11, unique=true)
     */
    private $iNE;

    /**
     * @var int
     *
     * @ORM\Column(name="mobile", type="integer", unique=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="mailaltern", type="string", length=255, unique=true)
     */
    private $mailaltern;

    /**
     * @var string
     *
     * @ORM\Column(name="diplomeEnCours", type="string", length=255)
     */
    private $diplomeEnCours;

    /**
     * @var string
     *
     * @ORM\Column(name="departement", type="string", length=255)
     */
    private $departement;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\ManyToMany(targetEntity="Cours", mappedBy="etudiants")
     */
    protected $cours;


    public function __construct()
    {
        $this->cours = new ArrayCollection();
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
     * Set iNE
     *
     * @param string $iNE
     *
     * @return Etudiant
     */
    public function setINE($iNE)
    {
        $this->iNE = $iNE;

        return $this;
    }

    /**
     * Get iNE
     *
     * @return string
     */
    public function getINE()
    {
        return $this->iNE;
    }

    /**
     * Set mobile
     *
     * @param integer $mobile
     *
     * @return Etudiant
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }

    /**
     * Get mobile
     *
     * @return int
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set mailaltern
     *
     * @param string $mailaltern
     *
     * @return Etudiant
     */
    public function setMailaltern($mailaltern)
    {
        $this->mailaltern = $mailaltern;

        return $this;
    }

    /**
     * Get mailaltern
     *
     * @return string
     */
    public function getMailaltern()
    {
        return $this->mailaltern;
    }

    /**
     * Set diplomeEnCours
     *
     * @param string $diplomeEnCours
     *
     * @return Etudiant
     */
    public function setDiplomeEnCours($diplomeEnCours)
    {
        $this->diplomeEnCours = $diplomeEnCours;

        return $this;
    }

    /**
     * Get diplomeEnCours
     *
     * @return string
     */
    public function getDiplomeEnCours()
    {
        return $this->diplomeEnCours;
    }

    /**
     * Set departement
     *
     * @param string $departement
     *
     * @return Etudiant
     */
    public function setDepartement($departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return string
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     *
     * @return Etudiant
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    public function addCours(Cours $course)
    {
        if ($this->cours->contains($course)) {
            return;
        }
        $this->cours[] = $course;
    }

    public function removeCours(Cours $course)
    {
        if ($this->cours->contains($course))
        {
            return $this->cours->removeElement($course);
        } else {
            return;
        }
    }

    /**
     * @return ArrayCollection|Cours[]
     */
    public function getCours()
    {
        return $this->cours;
    }

}

