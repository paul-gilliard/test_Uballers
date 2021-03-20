<?php

/**
 * Class User
 */
class User
{
    /**
     * @var String $nom
     */
    private $nom;
    /**
     * @var String $prenom
     */
    private $prenom;
    /**
     * @var  String $mail
     */
    private $mail;
    /**
     * @var String $password
     */
    private $password;
    /**
     * @var Date $birthDate
     */
    private $birthDate;
    /**
     * @var String $genre
     */
    private $genre;

    /**
     * User constructor.
     * @param String $prenom
     * @param String $nom
     * @param String $mail
     * @param String $password
     * @param Date $birthDate
     * @param String $genre
     */
    public function __construct($prenom, $nom, $mail, $password , $birthDate, $genre) {

        $this->setPrenom($prenom);
        $this->setNom($nom);
        $this->setMail($mail);
        $this->setPassword($password);
        $this->setBirthDate($birthDate);
        $this->setGenre($genre);

    }


    /**
     * @return String
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param String $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return String
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param String $prenom
     */
    public function setPrenom($prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return String
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param String $mail
     */
    public function setMail($mail): void
    {
        $this->mail = $mail;
    }

    /**
     * @return String
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return String
     */
    public function getDate()
    {
        return $this->birthDate;
    }

    /**
     * @param String $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return String
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * @param String $genre
     */
    public function setGenre($genre): void
    {
        $this->genre = $genre;
    }

}