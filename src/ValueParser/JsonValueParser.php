<?php declare(strict_types=1);

namespace MateuszMesek\Console\ValueParser;

use Magento\Framework\Serialize\Serializer\Json;

class JsonValueParser implements ValueParserInterface
{
    private Json $json;

    public function __construct(
        Json $json
    )
    {
        $this->json = $json;
    }

    public function parse($input)
    {
        return $this->json->unserialize($input);
    }
}
