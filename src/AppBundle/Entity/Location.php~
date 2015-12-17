<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Location
 *
 * @author elsa
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="location")
 */

class Location {
    
    
    /**
     * @ORM\OneToMany(targetEntity="Job", mappedBy="codpost")
     */
    protected $jobs;

    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }
    
    
     /**
     * @ORM\Column(type="integer")
     * @ORM\Id     
     */
    protected $codigo;   
    
   
    /**
     * @ORM\Column(type="string", length=50)
    */
    protected $naamcommune;
    
    /**
     * @ORM\Column(type="string", length=60)
    */
    protected $province;    

   

    /**
     * Set naamcommune
     *
     * @param string $naamcommune
     *
     * @return Location
     */
    public function setNaamcommune($naamcommune)
    {
        $this->naamcommune = $naamcommune;

        return $this;
    }

    /**
     * Get naamcommune
     *
     * @return string
     */
    public function getNaamcommune()
    {
        return $this->naamcommune;
    }

    /**
     * Set province
     *
     * @param string $province
     *
     * @return Location
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get province
     *
     * @return string
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set codigo
     *
     * @param integer $codigo
     *
     * @return Location
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return integer
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Add job
     *
     * @param \AppBundle\Entity\Job $job
     *
     * @return Location
     */
    public function addJob(\AppBundle\Entity\Job $job)
    {
        $this->jobs[] = $job;

        return $this;
    }

    /**
     * Remove job
     *
     * @param \AppBundle\Entity\Job $job
     */
    public function removeJob(\AppBundle\Entity\Job $job)
    {
        $this->jobs->removeElement($job);
    }

    /**
     * Get jobs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJobs()
    {
        return $this->jobs;
    }
}
