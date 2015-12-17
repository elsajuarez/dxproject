<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Job
 *
 * @author elsa
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="job")
 */
class Job {    
    /**
     * @ORM\ManyToOne(targetEntity="Location", inversedBy="jobs")
     * @ORM\JoinColumn(name="code_id", referencedColumnName="codigo")
     */
    protected $codpost;
    
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $namejob;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $adres;
   

   

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
     * Set namejob
     *
     * @param string $namejob
     *
     * @return Job
     */
    public function setNamejob($namejob)
    {
        $this->namejob = $namejob;

        return $this;
    }

    /**
     * Get namejob
     *
     * @return string
     */
    public function getNamejob()
    {
        return $this->namejob;
    }

    /**
     * Set adres
     *
     * @param string $adres
     *
     * @return Job
     */
    public function setAdres($adres)
    {
        $this->adres = $adres;

        return $this;
    }

    /**
     * Get adres
     *
     * @return string
     */
    public function getAdres()
    {
        return $this->adres;
    }

    /**
     * Set codpost
     *
     * @param \AppBundle\Entity\Location $codpost
     *
     * @return Job
     */
    public function setCodpost(\AppBundle\Entity\Location $codpost = null)
    {
        $this->codpost = $codpost;

        return $this;
    }

    /**
     * Get codpost
     *
     * @return \AppBundle\Entity\Location
     */
    public function getCodpost()
    {
        return $this->codpost;
    }
}
