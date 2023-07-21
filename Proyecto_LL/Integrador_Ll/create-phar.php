<?php

// 1.- Añadir este archivo haciéndolo hermano de la carpeta que deseas convertir a phar
// 2.- Abrir consola
// 3.- Ir a la carpeta donde está este archivo
// 4.- Ejecutar el siguiente comando: php --define phar.readonly=0 create-phar.php


//putenv('TMPDIR=/Applications/XAMPP/htdocs/testtwig3/tmp');
//die(sys_get_temp_dir());
try
{
    $pharFile = 'twig3.phar';

    // clean up
    if (file_exists($pharFile)) 
    {
        unlink($pharFile);
    }

    if (file_exists($pharFile . '.gz')) 
    {
        unlink($pharFile . '.gz');
    }

    // create phar
    $phar = new Phar($pharFile);

    // start buffering. Mandatory to modify stub to add shebang
    $phar->startBuffering();

    // Create the default stub from main.php entrypoint
    $stub = $phar->createDefaultStub('../View/v_principal.php');

    // Add the rest of the apps files
    $phar->buildFromDirectory(__DIR__ . '/principales');

    // Customize the stub to add the shebang
    //$stub = "#!/usr/bin/env php \n" . $stub;

    // Add the stub
    $phar->setStub($stub);

    $phar->stopBuffering();

    // plus - compressing it into gzip  
    //$phar->compressFiles(Phar::GZ);

    # Make the file executable
    chmod(__DIR__ . '/twig3.phar', 0777);
//	die('a');
    echo "$pharFile successfully created" . PHP_EOL;
}
catch (Exception $e)
{
    echo $e->getMessage();
}