<?php

namespace Database\Seeders\Concerns;

trait PrintsToCLI
{
    /**
     * Outputs a message and a title if provided to the command line interface (console)
     *
     * @param string $message
     * @param string $title
     */
    private function output(string $message, string $title = null)
    {
        if ($title) {
            $this->command->comment( $title );
        }

        $this->command->info(
            $message,
            $this->command->getOutput()->getFormatter()->hasStyle('changed') ? 'changed' : null
        );
    }
}
