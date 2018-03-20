<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cours
 *
 * @ORM\Table(name="cours")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CoursRepository")
 */
class Cours
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
     * @var string
     *
     * @ORM\Column(name="nomCours", type="string", length=255)
     */
    private $nomCours;

    /**
     * @var string
     *
     * @ORM\Column(name="nomEns", type="string", length=255)
     */
    private $nomEns;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="User",inversedBy="cours")
     * @ORM\JoinColumn(name="idEns",referencedColumnName="id")
     * @ORM\Column(name="idEns", type="integer")
     */
    private $idEns;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreChx", type="integer")
     */
    private $nombreChx;

    /**
     * @var int
     *
     * @ORM\Column(name="nombreTotal", type="integer")
     */
    private $nombreTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="heure", type="string")
     */
    private $heure;

    /**
     * @var string
     *
     * @ORM\Column(name="jour", type="string", length=255)
     */
    private $jour;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=255)
     */
    private $lieu;

    /**
     * @var float
     *
     * @ORM\Column(name="credit", type="float")
     */
    private $credit;

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
     * Set nomCours
     *
     * @param string $nomCours
     *
     * @return Cours
     */
    public function setNomCours($nomCours)
    {
        $this->nomCours = $nomCours;

        return $this;
    }

    /**
     * Get nomCours
     *
     * @return string
     */
    public function getNomCours()
    {
        return $this->nomCours;
    }

    /**
     * Set nomEns
     *
     * @param string $nomEns
     *
     * @return Cours
     */
    public function setNomEns($nomEns)
    {
        $this->nomEns = $nomEns;

        return $this;
    }

    /**
     * Get nomEns
     *
     * @return string
     */
    public function getNomEns()
    {
        return $this->nomEns;
    }

    /**
     * Set idEns
     *
     * @param integer $idEns
     *
     * @return Cours
     */
    public function setIdEns($idEns)
    {
        $this->idEns = $idEns;

        return $this;
    }

    /**
     * Get idEns
     *
     * @return int
     */
    public function getIdEns()
    {
        return $this->idEns;
    }

    /**
     * Set etudiant
     *
     * @param integer $etudiant
     *
     * @return Cours
     */
    public function setEtudiant($etudiant)
    {
        $this->etudiant = $etudiant;
        return $this;
    }

    /**
     * Get etudiant
     *
     * @return int
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }

    /**
     * Set nombreChx
     *
     * @param integer $nombreChx
     *
     * @return Cours
     */
    public function setNombreChx($nombreChx)
    {
        $this->nombreChx = $nombreChx;

        return $this;
    }

    /**
     * Get nombreChx
     *
     * @return int
     */
    public function getNombreChx()
    {
        return $this->nombreChx;
    }

    /**
     * Set nombreTotal
     *
     * @param integer $nombreTotal
     *
     * @return Cours
     */
    public function setNombreTotal($nombreTotal)
    {
        $this->nombreTotal = $nombreTotal;

        return $this;
    }

    /**
     * Get nombreTotal
     *
     * @return int
     */
    public function getNombreTotal()
    {
        return $this->nombreTotal;
    }

    /**
     * Set heure
     *
     * @param \DateTime $heure
     *
     * @return Cours
     */
    public function setHeure($heure)
    {
        $this->heure = $heure;

        return $this;
    }

    /**
     * Get heure
     *
     * @return \DateTime
     */
    public function getHeure()
    {
        return $this->heure;
    }

    /**
     * Set jour
     *
     * @param string $jour
     *
     * @return Cours
     */
    public function setJour($jour)
    {
        $this->jour = $jour;

        return $this;
    }

    /**
     * Get jour
     *
     * @return string
     */
    public function getJour()
    {
        return $this->jour;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Cours
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set credit
     *
     * @param float $credit
     *
     * @return Cours
     */
    public function setCredit($credit)
    {
        $this->credit = $credit;

        return $this;
    }

    /**
     * Get credit
     *
     * @return float
     */
    public function getCredit()
    {
        return $this->credit;
    }
}
