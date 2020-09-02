<?php

/**
*   User class - Has the same properties than the columns in the database
*/
class Post {
	/** @var int|null */
    private $id;

    /** @var int|null */
    private $created_by;

    /** @var string|null */
    private $content;

    /** @var DateTime|null */
    private $created_at;

    public function __construct()
    {
        $this->created_at = new DateTime('now');
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCreatedBy(): ?string
    {
        return $this->created_by;
    }

    /**
     * @param string|null $created_by
     */
    public function setCreatedBy(?string $created_by): void
    {
        $this->created_by = $created_by;
    }

    /**
     * @return string|null
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param string|null $email
     */
    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    /**
     * @return DateTime|null
     */
    public function getCreatedAt(): ?DateTime
    {
        return $this->created_at;
    }

    /**
     * @param DateTime|null $created_by
     */
    public function setCreatedAt(?DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

}