<?php

namespace BrainGames\Engine;

use function BrainGames\Cli\welcome;
use function cli\line;

const NUMBER_OF_ROUNDS = 3;

function executeGameTemplate(string $descriptionOfGame, callable $functionOfGame): void
{
    $name = welcome();
    line($descriptionOfGame);

    for ($i = 0; $i < NUMBER_OF_ROUNDS; $i++) {
        
        [$answerOfUser, $answerCorrect] = $functionOfGame();
        if ($answerOfUser === $answerCorrect) {
            line('Correct!');
        } else {
            line("'{$answerOfUser}' is wrong answer ;(. Correct answer was '{$answerCorrect}'");
            line("Let's try again, {$name}");
            return;
        }
    }
    line("Congratulations, {$name}");
    return;
}