<?php

function saveRecipe(array $recipeData, string $filename): void
{
    $jsonData = json_encode($recipeData, JSON_UNESCAPED_UNICODE) . PHP_EOL;
    file_put_contents($filename, $jsonData, FILE_APPEND);
}

function getAllRecipes(string $filename): array
{
    $recipes = [];
    if (file_exists($filename)) {
        $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $recipe = json_decode($line, true);
            if (is_array($recipe)) {
                $recipes[] = $recipe;
            }
        }
    }
    return $recipes;
}

function getLatestRecipes(string $filename, int $limit): array
{
    $recipes = getAllRecipes($filename);
    return array_slice($recipes, -$limit);
}