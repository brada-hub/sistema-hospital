FROM node:20-slim

WORKDIR /usr/src/app

COPY package*.json ./
RUN rm -f package-lock.json && npm install --legacy-peer-deps

COPY . .

EXPOSE 9000

CMD ["npm", "run", "dev"]
