<?php

function download(string $uri, string $output): void
{
    passthru("wget $uri -O $output", $exit);
    if ($exit !== 0) {
        passthru("curl -LO $uri -o $output", $exit);
    }
    if ($exit !== 0) {
        throw new RuntimeException("Failed to download '$uri'");
    }
}

function myScanDir(string $dir, ?callable $filter = null): array
{
    $files = @scandir($dir);
    if ($files === false) {
        throw new RuntimeException(error_get_last()['message']);
    }
    $files = array_filter($files, static fn(string $file) => $file[0] !== '.');
    array_walk($files, static function (&$file) use ($dir): void { $file = "{$dir}/{$file}"; });

    return array_values($filter ? array_filter($files, $filter) : $files);
}

$name = 'swow';
$branch = 'develop';
$localProjectPath = dirname(__DIR__) . "/$name";

if (is_dir($localProjectPath)) {
    $projectPath = $localProjectPath;
} else {
    $savedPath = __DIR__;
    $tarName = "$name.zip";
    $projectDirName = "$name-$branch";
    $projectPath = __DIR__ . "/$name-$branch";

    $output = "$savedPath/$tarName";
    if (!file_exists($output)) {
        download("https://github.com/swow/swow/archive/refs/heads/$branch.tar.gz", $output);
        if (!is_dir($projectPath)) {
            passthru("tar xvzf $savedPath/$tarName -C $savedPath", $exit);
            if ($exit !== 0) {
                throw new RuntimeException("Failed to extract $tarName");
            }
        }
    }
}

$apiLists = [];
$headerFiles = myScanDir("$projectPath/ext/include", fn(string $file) => str_ends_with($file, '.h'));
foreach ($headerFiles as $headerFile) {
    $apiList = [];
    $headerContents = file_get_contents($headerFile);
    preg_match_all('/SWOW_API[ ][^ ][^;]+;/', $headerContents, $matches);
    $apiList = array_map(function (string $api) {
        return preg_replace('/[ ]+/', ' ', str_replace("\n", '', $api));
    }, $matches[0]);
    if (empty($apiList)) {
        continue;
    }
    preg_match('/\/(\w+)\.h/', $headerFile, $match);
    $name = $match[1];
    $apiLists[$name] = $apiList;
}

$apiListMd = [];
foreach ($apiLists as $moduleName => $apiList) {
    $apiListMd[] = "## $moduleName";
    $apiListMd[] = '```C';
    foreach ($apiList as $api) {
        $apiListMd[] = "$api";
    }
    $apiListMd[] = '```';
}
$apiListMd[] = '';
$apiListMd = implode("\n", $apiListMd);

$readme = <<<MARKDOWN
# Swow Extension API List

$apiListMd
MARKDOWN;

file_put_contents(__DIR__ . '/README.md', $readme);
