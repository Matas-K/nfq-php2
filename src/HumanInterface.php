<?php

namespace Nfq\Akademija;

interface HumanInterface
{
    public function getFirstName(): string;

    public function getLastName(): string;

    public function setFirstName(string $firstName): HumanInterface;

    public function setLastName(string $lastName): HumanInterface;
}