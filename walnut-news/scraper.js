import { launch } from 'puppeteer';

async function getNewsTitle() {
    try {
        const browser = await launch({
            headless: true,
        });

        const page = await browser.newPage();

        page.on('load', () => console.log('Sayfa yüklendi'));

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

// Fonksiyonu çalıştır
getNewsTitle()
    .then(title => console.log('İşlem başarılı:', title))
    .catch(error => console.error('İşlem başarısız:', error));