<?php declare(strict_types=1);

namespace MateuszMesek\Console\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Context implements ContextInterface
{
    private static ?InputInterface $input = null;
    private static ?OutputInterface $output = null;

    public function setInput(InputInterface $input): void
    {
        self::$input = $input;
    }

    public function getInput(): ?InputInterface
    {
        return self::$input;
    }

    public function setOutput(OutputInterface $output): void
    {
        self::$output = $output;
    }

    public function getOutput(): ?OutputInterface
    {
        return self::$output;
    }
}
