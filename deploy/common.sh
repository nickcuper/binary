#!/bin/bash

appdir=./
logfile=./runtime/update.log

printerror() {
	format='\n! Error: %s\n%s\n\n'
	printf "$format" "$1" "$2"
}

logstr() {
    echo "`date "+%Y.%m.%d %H:%M"` - $@" | tee -a $logfile
}
