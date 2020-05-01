<?php


namespace Entities;


use Config\Config;

class Picture
{
    /** @var int */
    private $id;

    /** @var int */
    private $categoryId;

    /** @var string */
    private $path;

    /** @var string */
    private $comment;

    /** @var bool */
    private $deleted;

    /** @var string */
    private $categoryName;

    /** @var bool */
    private $coverPicture;

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
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId(int $categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return sprintf('%s%s', Config::PIC_DEFAULT_PATH, $this->path);
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment | null
     */
    public function setComment($comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return bool
     */
    public function isDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    /**
     * @return string
     */
    public function getCategoryName(): string
    {
        return $this->categoryName;
    }

    /**
     * @param string $categoryName
     */
    public function setCategoryName(string $categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @return bool
     */
    public function isCoverPicture(): bool
    {
        return $this->coverPicture;
    }

    /**
     * @param bool $coverPicture
     */
    public function setCoverPicture(bool $coverPicture): void
    {
        $this->coverPicture = $coverPicture;
    }
}
