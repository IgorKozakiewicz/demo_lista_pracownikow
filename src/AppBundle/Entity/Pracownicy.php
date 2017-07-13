<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pracownicy")
 */
class Pracownicy
{

    public function __construct()
    {
        $this->dataDodania = new \DateTime();
    }

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $imie;

    /**
     * @ORM\Column(type="string")
     */
    private $nazwisko;

    /**
     * @ORM\ManyToOne(targetEntity="Oddzialy")
     */
    private $oddzialy;

    /**
     * @ORM\Column(type="datetime", name="data_dodania")
     */
    private $dataDodania;

    /**
     * @ORM\Column(type="boolean")
     */
    private $czyPracuje = 1;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getImie()
    {
        return $this->imie;
    }

    /**
     * @param mixed $imie
     */
    public function setImie($imie)
    {
        $this->imie = $imie;
    }

    /**
     * @return mixed
     */
    public function getNazwisko()
    {
        return $this->nazwisko;
    }

    /**
     * @param mixed $nazwisko
     */
    public function setNazwisko($nazwisko)
    {
        $this->nazwisko = $nazwisko;
    }

    /**
     * @return mixed
     */
    public function getOddzialy()
    {
        return $this->oddzialy;
    }

    /**
     * @param Oddzialy $oddzialy
     */
    public function setOddzialy(Oddzialy $oddzialy)
    {
        $this->oddzialy = $oddzialy;
    }

    /**
     * @return mixed
     */
    public function getDataDodania()
    {
        return $this->dataDodania;
    }

    /**
     * @param mixed $dataDodania
     */
    public function setDataDodania($dataDodania)
    {
        $this->dataDodania = $dataDodania;
    }

    /**
     * @return mixed
     */
    public function getCzyPracuje()
    {
        return $this->czyPracuje;
    }

    /**
     * @param mixed $czyPracuje
     */
    public function setCzyPracuje($czyPracuje)
    {
        $this->czyPracuje = $czyPracuje;
    }


}