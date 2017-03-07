<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Exercice
 *
 * @ORM\Table(name="exercice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ExerciceRepository")
 */
class Exercice
{
    /**
     * @ORM\OneToMany(targetEntity="Appel", mappedBy="exercice")
     */
    private $appels;
    /**
     * @ORM\OneToMany(targetEntity="Encaissement", mappedBy="exercice")
     */
    private $encaissements;
    /**
     * @ORM\OneToMany(targetEntity="Paiement", mappedBy="exercice")
     */
    private $paiements;
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
     * @ORM\Column(name="libExercice", type="string", length=10)
     */
    private $libExercice;

    /**
     * @var bool
     *
     * @ORM\Column(name="estActif", type="boolean")
     */
    private $estActif;


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
     * Set libExercice
     *
     * @param string $libExercice
     *
     * @return Exercice
     */
    public function setLibExercice($libExercice)
    {
        $this->libExercice = $libExercice;

        return $this;
    }

    /**
     * Get libExercice
     *
     * @return string
     */
    public function getLibExercice()
    {
        return $this->libExercice;
    }

    /**
     * Set estActif
     *
     * @param boolean $estActif
     *
     * @return Exercice
     */
    public function setEstActif($estActif)
    {
        $this->estActif = $estActif;

        return $this;
    }

    /**
     * Get estActif
     *
     * @return bool
     */
    public function getEstActif()
    {
        return $this->estActif;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->appels = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add appel
     *
     * @param \AppBundle\Entity\Appel $appel
     *
     * @return Exercice
     */
    public function addAppel(\AppBundle\Entity\Appel $appel)
    {
        $this->appels[] = $appel;

        return $this;
    }

    /**
     * Remove appel
     *
     * @param \AppBundle\Entity\Appel $appel
     */
    public function removeAppel(\AppBundle\Entity\Appel $appel)
    {
        $this->appels->removeElement($appel);
    }

    /**
     * Get appels
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAppels()
    {
        return $this->appels;
    }

    /**
     * Add encaissement
     *
     * @param \AppBundle\Entity\Encaissement $encaissement
     *
     * @return Exercice
     */
    public function addEncaissement(\AppBundle\Entity\Encaissement $encaissement)
    {
        $this->encaissements[] = $encaissement;

        return $this;
    }

    /**
     * Remove encaissement
     *
     * @param \AppBundle\Entity\Encaissement $encaissement
     */
    public function removeEncaissement(\AppBundle\Entity\Encaissement $encaissement)
    {
        $this->encaissements->removeElement($encaissement);
    }

    /**
     * Get encaissements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEncaissements()
    {
        return $this->encaissements;
    }

    /**
     * Add paiement
     *
     * @param \AppBundle\Entity\Paiement $paiement
     *
     * @return Exercice
     */
    public function addPaiement(\AppBundle\Entity\Paiement $paiement)
    {
        $this->paiements[] = $paiement;

        return $this;
    }

    /**
     * Remove paiement
     *
     * @param \AppBundle\Entity\Paiement $paiement
     */
    public function removePaiement(\AppBundle\Entity\Paiement $paiement)
    {
        $this->paiements->removeElement($paiement);
    }

    /**
     * Get paiements
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPaiements()
    {
        return $this->paiements;
    }
}
