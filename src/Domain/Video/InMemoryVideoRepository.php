<?php

declare(strict_types=1);

namespace Alura\Calisthenics\Domain\Video;

use Alura\Calisthenics\Domain\Student\Student;

class InMemoryVideoRepository implements VideoRepository
{
    private VideoList $videoList;

    public function __construct()
    {
        $this->videoList = new VideoList();
    }

    public function add(Video $video): self
    {
        $this->videoList->add($video);

        return $this;
    }

    public function videosFor(Student $student): array
    {
        return array_filter(
            $this->videoList->videos(), 
            fn (Video $video) => $video->getAgeLimit() <= $student->age()
        );
    }
}
