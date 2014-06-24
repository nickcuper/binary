#!/bin/bash

if [ "$#" -ne 2 ] && [ "$#" -ne 3 ]
then
  echo "Usage: run.sh user@hostname path [env=dev]"
  exit 1
fi

env=${3:-"dev"}

dir=$(dirname $0)

. $dir/common.sh

sh $dir/check-valid.sh || exit 1

ssh $1 "
cd $2
sh $appdir/deploy/update.sh $3
"
