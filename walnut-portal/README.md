<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## EC2 Kurulumu

### 1. EC2 Oluşturma
- AWS Management Console'a giriş yapılır.
- EC2 servisine gidilir.
- Yeni Örnekleme oluşturulur(Instance)(Ubuntu Server 22.04 LTS (HVM), SSD Volume Type).
- Instance Type seçilir. (t2.micro)

### 2. SSH ile Bağlantı ve AA Panel Kurulumu
Sunucu yönetimini kolaylaştırmak için AA Panel kullanılabilir. AA Panel, sunucu yönetimini kolaylaştıran açık kaynak kodlu bir arayüzdür.
- Terminal açılır.
- SSH ile bağlantı kurulur.
- AA Panel kurulumu için web sitesindeki komut çalıştırılır.

### 3. Websitesi Yayınlama
- Websitesi dosyaları sunucuya yüklenir.
- Websitesi dosyalarının bulunduğu dizine gidilir.
- Websitesi dosyaları yayınlanır.
- AA Panel üzerinden websitesi için domain yönlendirme oluşturulur.
- SSL sertifikası oluşturulur.
- Websitesi yayınlanır.
