#!/bin/bash
URL=$(curl -s "$1" | grep -o 'href="[^"]*"' | cut -f 2 -d '"' | grep -o '^.*[^/]')
echo "$URL"
