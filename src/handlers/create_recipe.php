<?php
require_once 'helpers.php';

function handleCreateRecipeForm(): void
{
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: /recipe-book/public/recipe/create.php');
        exit;
    }

    $formData = $_POST;
    $errors = [];

    $formData['recipe_name'] = filter_input(INPUT_POST, 'recipe_name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$formData['recipe_name']) {
        $errors['recipe_name'] = 'Введите название рецепта.';
    }

    $formData['recipe_category'] = filter_input(INPUT_POST, 'recipe_category', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$formData['recipe_category']) {
        $errors['recipe_category'] = 'Выберите категорию рецепта.';
    }

    $formData['ingredients'] = filter_input(INPUT_POST, 'ingredients', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$formData['ingredients']) {
        $errors['ingredients'] = 'Введите ингредиенты.';
    }

    $formData['description'] = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$formData['description']) {
        $errors['description'] = 'Введите описание.';
    }

    $formData['tags'] = $_POST['tags'] ?? [];
    $formData['tags'] = array_map('htmlspecialchars', $formData['tags']);

    $formData['steps'] = filter_input(INPUT_POST, 'steps', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if (!$formData['steps']) {
        $errors['steps'] = 'Введите шаги приготовления.';
    }

    if (!empty($errors)) {
        $query = http_build_query(['errors' => $errors]);
        header("Location: /recipe-book/public/recipe/create.php?$query");
        exit;
    }

    saveRecipe($formData, __DIR__ . '/../../storage/recipes.txt');

    header('Location: /recipe-book/public/');
    exit;
}

handleCreateRecipeForm();