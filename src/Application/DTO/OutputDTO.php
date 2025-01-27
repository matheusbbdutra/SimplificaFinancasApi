<?php

namespace App\Application\DTO;

use Symfony\Component\HttpFoundation\Response;

class OutputDTO
{
    public function __construct(
        private bool $success,
        private mixed $data = null,
        private ?string $message = null
    ) {

    }

    public static function success(mixed $data = null, ?string $message = null): self
    {
        return new self(true, $data, $message);
    }

    public static function failure(?string $message = null): self
    {
        return new self(false, null, $message);
    }

    public function isSuccess(): bool
    {
        return $this->success;
    }

    public function getData(): mixed
    {
        return $this->data;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }
}
