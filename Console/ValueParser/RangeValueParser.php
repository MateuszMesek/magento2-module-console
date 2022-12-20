<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\ValueParser;

class RangeValueParser implements ValueParserInterface
{
    public function parse($input)
    {
        $output = [];

        if (!is_array($input)) {
            $input = [$input];
        }

        while ($item = array_shift($input)) {
            $item = (string)$item;

            switch (true) {
                case str_contains($item, ','):
                    $explodedItems = explode(',', $item);

                    foreach (array_reverse($explodedItems) as $explodedItem) {
                        array_unshift($input, (int)$explodedItem);
                    }

                    unset($explodedItems);
                    break;

                case preg_match('~^(?<start>\d+)\.{2}(?<end>\d+)$~', $item, $matches) > 0:
                    $rangeItems = range((int)$matches['start'], (int)$matches['end']);

                    foreach (array_reverse($rangeItems) as $rangeItem) {
                        array_unshift($input, $rangeItem);
                    }

                    unset($rangeItems);
                    break;

                default:
                    $output[] = (int)$item;
            }
        }

        return array_values(
            array_unique(
                $output
            )
        );
    }
}
