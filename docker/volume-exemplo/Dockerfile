FROM node:latest
MAINTAINER Pedro Paiva
COPY . /var/www
WORKDIR /var/www
RUN npm install
ENTRYPOINT ["npm", "start"]
EXPOSE 3000