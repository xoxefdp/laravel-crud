#!/bin/bash

printf "docker build -t laravel-mix -f laravel-mix.dockerfile . \n"
docker build -t laravel-mix -f laravel-mix.dockerfile .

printf "docker run -v $(pwd):/var/www laravel-mix /bin/sh -c 'npm install --loglevel silly && npm run prod && chmod 664 public/images/*.png public/images/*.jpg' \n"
docker run -v $(pwd):/var/www laravel-mix /bin/sh -c "npm install --loglevel silly && npm run prod && chmod 664 public/images/*.png public/images/*.jpg"
exit 0