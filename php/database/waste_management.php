<?php
// Function to sort waste types
function sortWasteTypes($wasteArray) {
    $sortedWaste = [
        'recyclable' => 0,
        'organic' => 0,
        'non_recyclable' => 0,
        'hazardous' => 0
    ];

    foreach ($wasteArray as $waste) {
        switch ($waste) {
            case 'recyclable':
                $sortedWaste['recyclable']++;
                break;
            case 'organic':
                $sortedWaste['organic']++;
                break;
            case 'non_recyclable':
                $sortedWaste['non_recyclable']++;
                break;
            case 'hazardous':
                $sortedWaste['hazardous']++;
                break;
        }
    }

    return $sortedWaste;
}

// Function to calculate recycling rate
function calculateRecyclingRate($totalWaste, $recyclableWaste) {
    if ($totalWaste == 0) {
        return 0; // Avoid division by zero
    }
    return ($recyclableWaste / $totalWaste) * 100;
}
?>
