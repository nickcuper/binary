#!/bin/bash

dir=$(dirname $0)

. $dir/common.sh

files=$(find $appdir -type f | grep -vf deploy/ignore)
phpfiles=$(echo "$files" | grep '\.php$')

failed=0

echo "Checking for unstaged changes...";
txt=$(git diff --name-only HEAD)
test -z "$txt" || { printerror "directory has unstaged changes:" "$txt" ; failed=1; }

test -d "$appdir" || { printerror "application directory $appdir not found." "" ; exit 1; }

echo "Checking for unmerged code...";
txt=$(grep -rn "(<<<<|>>>>)" $files)
test -z "$txt" || { printerror "unmerged code found:" "$txt" ; failed=1; }

echo "Checking for PHP syntax errors...";
txt=$(echo "$phpfiles" | while read file; do php -l $file 2>&1; done | grep -v "No syntax errors detected")
test -z "$txt" || { printerror "application has PHP syntax errors:" "$txt" ; failed=1; }

test $failed -eq 0 || exit 1

sh $appdir/phpunit.sh || exit 1
