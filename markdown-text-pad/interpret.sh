#! /bin/bash

FILE=out.html

if [ -f $FILE ]; then
    rm $FILE
fi

./markdown.pl out.md > out.html
