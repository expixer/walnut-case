import { launch } from 'puppeteer';
import dotenv from 'dotenv';
dotenv.config();

async function getNewsTitle() {
    try {
        const browser = await launch({
            headless: true,
            args: ['--no-sandbox', '--disable-setuid-sandbox'],
        });

        const page = await browser.newPage();

        await page.goto('https://trthaber.com', {
            waitUntil: 'domcontentloaded'
        });

        const headlineId = await page.evaluate(() => {
            // başlık değişken olabilir 
            // headline ile başlayan ve Title ile biten ilk id'yi bul
            // Örnek: headline118427Title
            const el = document.querySelector('[id^="headline"][id$="Title"]');
            return el ? el.id : null;
        });
        const linkHref = await page.$eval(`#${headlineId} a`, element => element.href);

        await page.click(`a[href="${linkHref}"]`)

        const newsTitle = await page.evaluate(() => {
            const titleElement = document.querySelector('.news-title');

            return titleElement ? titleElement.textContent.trim() : null;
        });

        await browser.close();

        return newsTitle;

    } catch (error) {
        console.error('Bir hata oluştu:', error);
        throw error;
    }
}

async function senDataToApi(title) {
    try {
        const body = [
                { title, word_count: wordCount(title) }
        ];

        const response = await fetch(process.env.API_URL, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(body),
        });

        if (!response.ok) {
            throw new Error('API isteği başarısız');
        }

        const data = await response.json();

        console.log('API isteği başarılı:', data);
    } catch (error) {
        console.error('API isteği başarısız:', error);
        throw error;
    }
}

function wordCount(text) {
    if (typeof text !== 'string') return 0;
    const words = text.trim().split(/\s+/);
    return words.length;
}

const title = await getNewsTitle()
console.log('Başlık:', title);
await senDataToApi(title)