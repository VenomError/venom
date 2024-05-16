<?php

class View
{
    public static function Error(?array $params = []): void
    {
        if (!empty($params) && $params['error'] == 'clear') {
            // Path ke file error.log
            $filePath = 'log/error.log';
            // Mengosongkan isi file error.log
            $confirm = readline('Are you sure to clear log Error ? (y/n) : ');
            if ($confirm == 'y' || $confirm == 'Y') {
                try {
                    file_put_contents($filePath, '');
                    print ("SUCCESS | log Error Cleared ");
                } catch (Exception $e) {
                    print ("ERROR | " . $e->getMessage());
                }
            } else {
                print ("INFO | Cencelled");
                die;
            }
        } elseif (empty($params)) {
            echo "\033[2J\033[;H";
            $errorLogContent = file_get_contents('log/error.log');
            echo $errorLogContent;
        } else {
            print ("ERROR | Command not Found ");
            die;
        }


    }

}