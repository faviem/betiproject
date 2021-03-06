<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SousMenuRepository")
 * @ORM\Table("SousMenu")
 * @ORM\HasLifecycleCallbacks()
 */
class SousMenu {

    /**
     * @var int
     *
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string The libelle of the SousMenu.
     * @ORM\Column(name="libelle", nullable=true)
     * @Assert\Type(type="string")
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="Menu", inversedBy="sousMenus")
     */
    private $menu;

    /**
     * @ORM\OneToMany(targetEntity="Privilege", mappedBy="sousMenu")
     */
    private $privileges;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->privileges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return SousMenu
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
     * Set menu
     *
     * @param \AppBundle\Entity\Menu $menu
     *
     * @return SousMenu
     */
    public function setMenu(\AppBundle\Entity\Menu $menu = null)
    {
        $this->menu = $menu;

        return $this;
    }

    /**
     * Get menu
     *
     * @return \AppBundle\Entity\Menu
     */
    public function getMenu()
    {
        return $this->menu;
    }

    /**
     * Add privilege
     *
     * @param \AppBundle\Entity\Privilege $privilege
     *
     * @return SousMenu
     */
    public function addPrivilege(\AppBundle\Entity\Privilege $privilege)
    {
        $this->privileges[] = $privilege;

        return $this;
    }

    /**
     * Remove privilege
     *
     * @param \AppBundle\Entity\Privilege $privilege
     */
    public function removePrivilege(\AppBundle\Entity\Privilege $privilege)
    {
        $this->privileges->removeElement($privilege);
    }

    /**
     * Get privileges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPrivileges()
    {
        return $this->privileges;
    }
}
