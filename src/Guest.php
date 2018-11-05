<?php

namespace Nfq\Akademija;

class Guest implements HumanInterface
{
    use PrintableClass;
    
    private $firstName = '';
    private $lastName = '';
    
    public function __construct(string $firstName, string $lastName)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
    }
    
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setFirstName(string $firstName): HumanInterface
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function setLastName(string $lastName): HumanInterface
    {
        $this->lastName = $lastName;
        return $this;
    }

}