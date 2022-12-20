<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\ValueParser;

use Magento\Framework\Serialize\Serializer\Json;

class JsonValueParser implements ValueParserInterface
{
    public function __construct(
        private readonly Json $json
    )
    {
    }

    public function parse($input)
    {
        return $this->json->unserialize($input);
    }
}
