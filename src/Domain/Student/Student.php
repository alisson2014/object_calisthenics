<?php

declare(strict_types=1);

namespace Alura\Calisthenics\Domain\Student;

use Alura\Calisthenics\Domain\Address\Address;
use Alura\Calisthenics\Domain\Email\Email;
use Alura\Calisthenics\Domain\Video\Video;
use DateTimeInterface;

class Student
{
    private WatchedVideos $watchedVideos;

    public function __construct(
        private Email $email, 
        private DateTimeInterface $birthDate, 
        private FullName $fullName,
        private Address $address
    ) {
        $this->watchedVideos = new WatchedVideos();
    }

    public function fullName(): string
    {
        return (string) $this->fullName;
    }

    public function fullAddress(): string
    {
        return (string) $this->address;
    }

    public function email(): string
    {
        return (string) $this->email;
    }

    public function address(): Address
    {
        return $this->address;        
    }

    public function birthDate(): DateTimeInterface
    {
        return $this->birthDate;
    }

    public function watch(Video $video, DateTimeInterface $date)
    {
        $this->watchedVideos->add($video, $date);
    }

    public function hasAccess(): bool
    {
        if ($this->watchedVideos->count() === 0) {
            return true;
        }

        $firstDate = $this->watchedVideos->dateOfFirstVideo();
        $today = new \DateTimeImmutable();

        return $firstDate->diff($today)->days < 90;
    }

    public function age(): int
    {
        $today = new \DateTimeImmutable();
        $dateInterval = $this->birthDate->diff($today);

        return $dateInterval->y;
    }
}
