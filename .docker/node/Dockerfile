FROM node:lts-alpine as build-stage

WORKDIR /app

RUN ls -la

COPY ../../resources/app/package*.json ./
COPY ../../resources/app .

RUN apk update && apk add bash && apk add nano
RUN npm install
RUN npm install @vue/cli -g

EXPOSE 8080

CMD ["npm", "run", "serve"]