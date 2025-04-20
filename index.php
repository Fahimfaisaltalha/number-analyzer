<?php

// loop to repeatedly ask user for input
while (true) {
    echo "Enter a list of numbers separated by spaces (or type 'exit' to quit): ";
    $input = trim(fgets(STDIN)); 

    // Check if user wants to exit
    if (strtolower($input) === 'exit') {
        echo "Thank you for using Number Analyzer!\n";
        break; 
    }

    // Split input into array using space as delimiter
    $numberStrings = explode(" ", $input);
    $numbers = [];

    // Check if all elements are valid numbers
    $valid = true;
    foreach ($numberStrings as $value) {
        if (is_numeric($value)) {
            $numbers[] = floatval($value); // Convert to float and store
        } else {
            $valid = false;
            break;
        }
    }

    // If invalid input found, ask again
    if (!$valid || empty($numbers)) {
        echo "Invalid input detected. Please enter only numbers separated by spaces.\n\n";
        continue; 
    }

    // Calculations
    $max = max($numbers);
    $min = min($numbers);
    $sum = array_sum($numbers);
    $count = count($numbers);
    $average = $sum / $count;

    // Display results
    echo "\n=== Results ===\n";
    echo "Maximum: $max\n";
    echo "Minimum: $min\n";
    echo "Sum: $sum\n";
    echo "Average: " . number_format($average, 2) . "\n\n";
}

