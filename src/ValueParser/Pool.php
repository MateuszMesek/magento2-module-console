<?php declare(strict_types=1);

namespace MateuszMesek\Console\ValueParser;

use Magento\Framework\ObjectManager\TMap;
use Magento\Framework\ObjectManager\TMapFactory;

class Pool
{
    private TMap $parsers;
    private array $types;

    public function __construct(
        TMapFactory $TMapFactory,
        array $parsers = []
    )
    {
        $this->parsers = $TMapFactory->createSharedObjectsMap([
            'type' => ValueParserInterface::class,
            'array' => $parsers
        ]);
        $this->types = array_keys($parsers);
    }

    public function getTypes(): array
    {
        return $this->types;
    }

    public function get(string $type): ValueParserInterface
    {
        return $this->parsers[$type];
    }
}
