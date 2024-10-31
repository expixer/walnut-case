FROM node:22

WORKDIR /app
COPY package*.json ./
RUN npm install
COPY . .

RUN apt-get update && apt-get install -y \
    libnss3 \
    libatk1.0-0 \
    libatk-bridge2.0-0 \
    libdrm2 \
    libxkbcommon0 \
    libxcomposite1 \
    libxrandr2 \
    libgbm1 \
    xdg-utils

CMD ["node", "scraper.js"]
