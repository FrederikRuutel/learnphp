<?php

class Job {
    public function task(ConsoleLogger $logger) {
        for($i=0; $i<10; $i++) {
            $logger->log("Task running: " . $i);
        }
    }
}

class ConsoleLogger {
    public function log($message) {
        echo $message;
    }
}

class NothingLogger {
    public function log($message) {
        // Do nothing
    }
}

$job = new Job();
$logger = new NothingLogger();
$job->task($logger);