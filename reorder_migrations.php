<?php

$dir = __DIR__ . '/app/Database/Migrations/';
$files = glob($dir . '*.php');

// Parse dependencies
$dependencies = [];
$tableToFile = [];

foreach ($files as $file) {
    $content = file_get_contents($file);

    // Ambil nama file & nama tabel
    if (preg_match('/class\s+(\w+)/', $content, $m)) {
        $className = $m[1];
        $tableName = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $className));
        $tableToFile[$tableName] = $file;

        // Cari foreign key
        preg_match_all('/addForeignKey\s*\(\s*[\'"](\w+)[\'"]\s*,\s*[\'"](\w+)[\'"]/', $content, $matches, PREG_SET_ORDER);

        foreach ($matches as $match) {
            $dependencies[$file][] = $match[2]; // tabel tujuan foreign key
        }
    }
}

// Topological sort
$sorted = [];
$visited = [];

function visit($file, &$visited, &$sorted, $dependencies, $tableToFile) {
    if (isset($visited[$file])) return;
    $visited[$file] = true;

    if (!empty($dependencies[$file])) {
        foreach ($dependencies[$file] as $depTable) {
            if (isset($tableToFile[$depTable])) {
                visit($tableToFile[$depTable], $visited, $sorted, $dependencies, $tableToFile);
            }
        }
    }

    $sorted[] = $file;
}

foreach ($files as $file) {
    visit($file, $visited, $sorted, $dependencies, $tableToFile);
}

// Rename files dengan timestamp baru
$startTime = strtotime('2024-05-01 00:00:00');
$i = 1;
foreach ($sorted as $file) {
    $basename = basename($file);
    $newTimestamp = date('Y-m-d-His', $startTime + $i * 60); // 1 menit jeda tiap file
    $newName = $dir . $newTimestamp . '_' . preg_replace('/^\d{4}-\d{2}-\d{2}-\d{6}_/', '', $basename);

    echo "Rename: $basename → " . basename($newName) . PHP_EOL;
    rename($file, $newName);
    $i++;
}
