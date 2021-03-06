<?php

declare(strict_types=1);

namespace Mqlo\Nameable;

abstract class Nameable implements \JsonSerializable
{
    protected string $value;
    protected string $label;
    protected static array $all = [];
    protected static string $message = "%s not found in %s.";

    public function __construct(string $value)
    {
        if (!in_array($value, static::all(false), true)) {
            throw new \InvalidArgumentException(sprintf(static::$message, $value, static::class));
        }
        $this->value = $value;
        $this->label = static::$all[$value];
    }

    public static function all(bool $description): array
    {
        $names = array_keys(static::$all);

        return $description
            ? array_map(static function ($label, $name) {
                return [
                    'value' => $name,
                    'label' => $label,
                ];
            }, static::$all, $names)
            : $names;
    }

    public function value(): string
    {
        return $this->value;
    }

    public function label(): string
    {
        return $this->label;
    }

    public function jsonSerialize(): array
    {
        return [
            'value' => $this->value(),
            'label' => $this->label(),
        ];
    }
}
