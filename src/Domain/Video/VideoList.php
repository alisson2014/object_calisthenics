<?php

declare(strict_types=1);

namespace Alura\Calisthenics\Domain\Video;

final class VideoList
{
    /** @var Video[] */
    private array $videos = [];

    public function add(Video $video): void
    {
        $isInstanceOfVideo = $video instanceof Video;
        if (!$isInstanceOfVideo) {
            throw new \DomainException('Conteúdo não é uma instância de Video');
        }

        array_push($this->videos, $video);
    }

    /** @return Video[] */
    public function videos(): array
    {
        return $this->videos;
    }
}
