#!/bin/bash

dir=$(dirname $0)

. $dir/common.sh

env=${1:-"dev"}

echo "Env is $env"

echo "Checking for unstaged changes...";
txt=$(git diff --name-only HEAD)
test -z "$txt" || { printerror "directory has unstaged changes:" "$txt" ; exit 1; }

logstr "Update started at `git rev-parse HEAD`"

git pull
$dir/build.sh $env

logstr "Update finished at `git rev-parse HEAD`"
