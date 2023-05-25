<?php

namespace App\Entities;

class Task
{
    private int $id;
    private string $name;
    private int $status;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getStatus(): string
    {
        if ($this->status === 0) {
            return "Incomplete";
        } else if ($this->status === 1) {
            return "Complete";
        } else {
            return "Unknown";
        }
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
    }
}