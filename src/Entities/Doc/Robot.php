<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_robots')]
class Robot
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'smallint')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[Gedmo\Slug(fields: ['title'])]
    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private string $slug;

    #[ORM\Column(type: 'string', length: 255)]
    private string $previewImg;

    /**
     * @param string $title
     * @param string $previewImg
     */
    public function __construct(string $title, string $previewImg)
    {
        $this->setTitle($title);
        $this->setPreviewImg($previewImg);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return string
     */
    public function getPreviewImg(): string
    {
        return $this->previewImg;
    }

    /**
     * @param string $previewImg
     */
    public function setPreviewImg(string $previewImg): void
    {
        $this->previewImg = $previewImg;
    }
}