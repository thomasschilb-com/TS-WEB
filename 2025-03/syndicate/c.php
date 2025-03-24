<?php
/*

MIT License

Copyright (c) 2024 Thomas Schilb

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

This Script: thomas_schilb@outlook.com

*/

/* Edit to your Needs:  */

$lf_name = "no.dat";
$monthly = 1;
$monthly_path = "oldfiles";
$type = 2;
$beforeTotalText = "Hits: ";
$beforeUniqueText = "IP: ";
$display = 1;
$separator = "<br \>";

/* BEGIN */

$log_file = dirname(__FILE__) . '/' . $lf_name;

    $uIP = $_SERVER['REMOTE_ADDR'];
    
    if (file_exists($log_file)) {
        // Get contents of log file
        $log = file_get_contents($log_file);
        
        if ($monthly) {
            
            // Check if today is first day of month
            // Also check if prev month log file exists already
            $prev_name = $monthly_path . '/' . date("n-Y", strtotime("-1 month")) . '.txt';
            if (date('j') == 1 && !file_exists($prev_name)) {
                // If it is first day of month,
                // move previous log file to subdir and create new file
                
                // Ensure that monthly dir exists
                if (!file_exists($monthly_path)) {
                    mkdir($monthly_path);
                }
                
                copy($log_file, $prev_name);
                
                // Write new data based on config
                if ($type == 0) {
                    // Total hits
                    $toWrite = "1";
                    //$info = $beforeTotalText . "1";
                } else if ($type == 1) {
                    // Unique hits
                    $toWrite = "1;" . $uIP . ",";
                    $info = $beforeUniqueText . "1";
                } else if ($type == 2) {
                    // Unique and total
                    $toWrite = "1;1;" . $uIP . ",";
                    //$info = $beforeTotalText . "1" . $separator . $beforeUniqueText . "1";
                    $info = $separator . $beforeUniqueText . "1";
                }
                write_logfile($toWrite, $info);
                
            } else {
                // Still same month as before, so just increment counters
                
                // What to do depends on type from config
                if ($type == 0) {
                    // Total hits
                    // Create info to write to log file and info to show
                    $toWrite = intval($log) + 1;
                    $info = $beforeTotalText . $toWrite;
                    
                } else if ($type == 1) {
                    
                    // Separate log file into hits and IPs
                    $hits = reset(explode(";", $log));
                    $IPs = end(explode(";", $log));
                    $IPArray = explode(",", $IPs);
                    
                    // Check for visitor IP in list of IPs
                    if (array_search($uIP, $IPArray, true) === false) {
                        
                        // IP doesnt' exist so increase hits and include IP
                        $hits = intval($hits) + 1;
                        $toWrite = $hits . ";" . $IPs . $uIP . ",";
                    } else {
                        
                        // If IP exists don't change anything
                        $toWrite = $log;
                    }
                    
                    // Info to show
                    $info = $beforeUniqueText . $hits;
                    
                } else if ($type == 2) {
                    // Both total hits and unique hits
                    
                    // Separate log file into regular hits, unique hits, and IPs
                    $pieces = explode(";", $log);
                    $totalHits = $pieces[0];
                    $uniqueHits = $pieces[1];
                    $IPs = $pieces[2];
                    $IPArray = explode(",", $IPs);
                    
                    // Always increase regular hits, regardless of IP
                    $totalHits = intval($totalHits) + 1;
                    
                    // Search for visitor IP in list of IPs
                    if (array_search($uIP, $IPArray, true) === false) {
                        
                        // IP doesn't exist so increase unique hits and append IP
                        $uniqueHits = intval($uniqueHits) + 1;
                        $toWrite = $totalHits . ";" . $uniqueHits . ";" . $IPs . $uIP . ",";
                    } else {
                        
                        // If IP already exists just keep unique hits unchanged
                        $toWrite = $totalHits . ";" . $uniqueHits . ";" . $IPs;
                    }
                    // Info to show
                    $info = $beforeTotalText . $totalHits . $separator . $beforeUniqueText . $uniqueHits;
                }
                write_logfile($toWrite, $info);
            }
        } else {
            // What to do depends on type from config
            if ($type == 0) {
                // Total hits
                // Create info to write to log file and info to show
                $toWrite = intval($log) + 1;
                $info = $beforeTotalText . $toWrite;
                
            } else if ($type == 1) {
                
                // Separate log file into hits and IPs
                $hits = reset(explode(";", $log));
                $IPs = end(explode(";", $log));
                $IPArray = explode(",", $IPs);
                
                // Check for visitor IP in list of IPs
                if (array_search($uIP, $IPArray, true) === false) {
                    
                    // IP doesnt' exist so increase hits and include IP
                    $hits = intval($hits) + 1;
                    $toWrite = $hits . ";" . $IPs . $uIP . ",";
                } else {
                    
                    // If IP exists don't change anything
                    $toWrite = $log;
                }
                
                // Info to show
                $info = $beforeUniqueText . $hits;
                
            } else if ($type == 2) {
                // Both total hits and unique hits
                
                // Separate log file into regular hits, unique hits, and IPs
                $pieces = explode(";", $log);
                $totalHits = $pieces[0];
                $uniqueHits = $pieces[1];
                $IPs = $pieces[2];
                $IPArray = explode(",", $IPs);
                
                // Always increase regular hits, regardless of IP
                $totalHits = intval($totalHits) + 1;
                
                // Search for visitor IP in list of IPs
                if (array_search($uIP, $IPArray, true) === false) {
                    
                    // IP doesn't exist so increase unique hits and append IP
                    $uniqueHits = intval($uniqueHits) + 1;
                    $toWrite = $totalHits . ";" . $uniqueHits . ";" . $IPs . $uIP . ",";
                } else {
                    
                    // If IP already exists just keep unique hits unchanged
                    $toWrite = $totalHits . ";" . $uniqueHits . ";" . $IPs;
                }
                // Info to show
                $info = $separator . $beforeUniqueText . $uniqueHits;
            }
            write_logfile($toWrite, $info);
        }
    } else {
        // If "hits.txt" doesn't exist, create it
        $fp = fopen($log_file, "w");
        fclose($fp);
        if ($type == 0) {
            $toWrite = "1";
            $info = $beforeTotalText . "1";
        } else if ($type == 1) {
            $toWrite = "1;" . $uIP . ",";
            $info = $beforeUniqueText . "1";
        } else if ($type == 2) {
            $toWrite = "1;1;" . $uIP . ",";
            $info = $separator . $beforeUniqueText . "1";
        }
        write_logfile($toWrite, $info);
    }

function write_logfile($data, $output) {
    global $log_file;
    file_put_contents($log_file, $data);
    echo $output;
}

?>