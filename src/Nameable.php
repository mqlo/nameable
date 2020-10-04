<?php

declare(strict_types=1);

namespace Mqlo\Nameable;

abstract class Nameable implements \JsonSerializable
{
    protected string $name;
    protected string $label;
    protected static array $all = [];
    protected static string $message = "%s not found in %s.";

    public function __construct(string $name)
    {
        if (!in_array($name, static::all(false), true))
            throw new \InvalidArgumentException(sprintf(static::$message, $name, static::class));
        $this->name = $name;
        $this->label = static::all(true)[$name];
    }

    final public static function all(bool $description): array
    {
        return $description ? static::$all : array_keys(static::$all);
    }

    final public function name(): string
    {
        return $this->name;
    }

    final public function label(): string
    {
        return $this->label;
    }

    final public function jsonSerialize(): array
    {
        return [
            'name' => $this->name(),
            'label' => $this->label(),
        ];
    }
}
