<?php declare(strict_types=1);

namespace MateuszMesek\Console\Console\Input;

use MateuszMesek\Console\Console\ValueParser\Pool as ValueParserPool;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;

class WrappedInput implements InputInterface
{

    public function __construct(
        private readonly InputInterface  $input,
        private readonly ValueParserPool $valueParserPool
    )
    {
    }

    public function getFirstArgument()
    {
        return $this->input->getFirstArgument();
    }

    public function hasParameterOption($values, $onlyParams = false)
    {
        return $this->input->hasParameterOption($values, $onlyParams);
    }

    public function getParameterOption($values, $default = false, $onlyParams = false)
    {
        return $this->input->getParameterOption($values, $default, $onlyParams);
    }

    public function bind(InputDefinition $definition)
    {
        $this->input->bind($definition);

        foreach ($this->valueParserPool->getTypes() as $type) {
            foreach ($definition->getArguments() as $inputArgument) {
                if (!$inputArgument instanceof $type) {
                    continue;
                }

                $name = $inputArgument->getName();

                if (!$this->input->hasArgument($name)) {
                    continue;
                }

                $value = $this->input->getArgument($name);

                if (null === $value) {
                    continue;
                }

                $this->input->setArgument(
                    $name,
                    $this->valueParserPool->get($type)->parse($value)
                );
            }

            foreach ($definition->getOptions() as $inputOption) {
                if (!$inputOption instanceof $type) {
                    continue;
                }

                $name = $inputOption->getName();

                if (!$this->input->hasOption($name)) {
                    continue;
                }

                $value = $this->input->getOption($name);

                if (null === $value) {
                    continue;
                }

                $this->input->setOption(
                    $name,
                    $this->valueParserPool->get($type)->parse($value)
                );
            }
        }
    }

    public function validate()
    {
        $this->input->validate();
    }

    public function getArguments()
    {
        return $this->input->getArguments();
    }

    public function getArgument($name)
    {
        return $this->input->getArgument($name);
    }

    public function setArgument($name, $value)
    {
        $this->input->setArgument($name, $value);
    }

    public function hasArgument($name)
    {
        return $this->input->hasArgument($name);
    }

    public function getOptions()
    {
        return $this->input->getOptions();
    }

    public function getOption($name)
    {
        return $this->input->getOption($name);
    }

    public function setOption($name, $value)
    {
        $this->input->setOption($name, $value);
    }

    public function hasOption($name)
    {
        return $this->input->hasArgument($name);
    }

    public function isInteractive()
    {
        return $this->input->isInteractive();
    }

    public function setInteractive($interactive)
    {
        $this->input->setInteractive($interactive);
    }
}
