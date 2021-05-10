FROM node:8.17.0-alpine3.11

# Set working directory
WORKDIR /var/www

# Update base image
RUN set -xe && \
  apk add --no-cache --update && \
  rm -rf /tmp/* /var/cache/apk/*

# ENTRYPOINT [ "npm", "run", "serve:commonjs:dev" ]
CMD [ "" ]

VOLUME [ "/var/www" ]