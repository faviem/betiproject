<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MenuRepository")
 * @ORM\Table("Menu")
 * @ORM\HasLifecycleCallbacks()
 */
class Menu {

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The libelle of the Menu.
     * @ORM\Column(name="libelle", nullable=true)
     * @Assert\Type(type="string")
     */
    private $libelle;

    /**
     * @ORM\OneToMany(targetEntity="SousMenu", mappedBy="menu")
     */
    private $sousMenus;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sousMenus = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Menu
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Add sousMenu
     *
     * @param \AppBundle\Entity\SousMenu $sousMenu
     *
     * @return Menu
     */
    public function addSousMenu(\AppBundle\Entity\SousMenu $sousMenu)
    {
        $this->sousMenus[] = $sousMenu;

        return $this;
    }

    /**
     * Remove sousMenu
     *
     * @param \AppBundle\Entity\SousMenu $sousMenu
     */
    public function removeSousMenu(\AppBundle\Entity\SousMenu $sousMenu)
    {
        $this->sousMenus->removeElement($sousMenu);
    }

    /**
     * Get sousMenus
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousMenus()
    {
        return $this->sousMenus;
    }
}
