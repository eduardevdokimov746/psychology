<?php

namespace App\Entities\Doc;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Timestampable\Traits\TimestampableEntity;

#[ORM\Entity]
#[ORM\Table(name: 'doc_articles')]
class Article
{
    use TimestampableEntity;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 255)]
    private string $title;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    #[Gedmo\Slug(fields: ['title'])]
    private string $slug;

    #[ORM\Column(type: 'text')]
    private string $content;

    #[ORM\Column(type: 'string', length: 255)]
    private string $previewImg;

    #[ORM\ManyToOne(targetEntity: PsychologistProfile::class)]
    private PsychologistProfile $psychologistProfile;

    public function __construct(string $title, string $content, string $previewImg, PsychologistProfile $psychologistProfile)
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->setPreviewImg($previewImg);
        $this->setPsychologistProfile($psychologistProfile);
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
    public function setSlug(string $slug): void
    {
        $this->slug = $slug;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     */
    public function setContent(string $content): void
    {
        $this->content = $content;
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

    /**
     * @return PsychologistProfile
     */
    public function getPsychologistProfile(): PsychologistProfile
    {
        return $this->psychologistProfile;
    }

    /**
     * @param PsychologistProfile $psychologistProfile
     */
    public function setPsychologistProfile(PsychologistProfile $psychologistProfile): void
    {
        $this->psychologistProfile = $psychologistProfile;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}