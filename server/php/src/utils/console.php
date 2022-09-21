<?php
function console_command(string $command): string
{
    if ($command == "ls" or $command == "ps") {
        return system($command);
    }
    else {
        return "<div style='color: red'>Неопознанная команда!</div>\n";
    }
}
