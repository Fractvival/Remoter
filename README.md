## REMOTER 
### (web management+wemos sketch)
-------

**Vzdálené ovládání zařízení přes web pomocí MySQL.**

- Testováno na desce Wemos **D1 mini**, **D1 mini Lite**
- Typ testovacího relé: **JQC3F-05VDC-C**


Ve složce **Web** se nachází ovládací část, která se kopíruje na webhosting

Ve složce **PCremoter** se nachází zdroják pro zapínání/vypínání PC, který se nahraje do desky (wemosky)



### PCremoter:

Pro úspěšné přelinkování je zapotřebí stáhnout knihovnu **MySQL Connector Arduino by Charles Bell v1.1.1**

Před linkováním nastavit údaje pro Wifi v úvodu zdrojáku.

```C++
// UDAJE K PRIHLASENI NA SIT WIFI
//************************************
// Nazev wifi
char ssid[] = "NAZEV_WIFI";
// Heslo wifi
char pass[] = "HESLO_WIFI";
```

V další části zdrojáku lze nastavit časy/délku pro spínání relé a pin pro jeho ovládání.

```C++
// OZNACENI PINU PRO RELE A CASY [ms]
//************************************
// DIGITAL pin pro ovladani
int relayPin  = D1;
// Delka intervalu pro zapnuti PC
int onDelay   = 500;
// Delka intervalu pro vypnuti PC
int offDelay  = 8000;
```

Dále pak je možné nastavovat databázi MySQL. Většina MySQL serverů/hostingů neuvádí přímo IP adresu, ale URL. IP adresu z URL lze zjistit například zde: https://ipinfo.info/html/ip_checker.php

```C++
// DATA K PRIHLASENI DO DATABAZE MYSQL
//************************************
// IP adresa MySQL serveru
IPAddress sql_ipaddr(127,0,0,1);
// Prihlasovaci jmeno
char sql_user[] = "JMENO";
// Heslo
char sql_pass[] = "HESLO";
```

Program očekává databázi, která obsahuje tabulku s názvem **table**, ve které se nachází dva sloupce **id** a **value**. Aktuálně má tabulka následující podobu:

|   id   |  value  |
| :---:  |  :---:  |
| PC11   |    0    |
| PC12   |    0    |
| PC13   |    0    |
| PC21   |    0    |
| PC22   |    0    |
| PC23   |    0    |
| PC31   |    0    |
| PC32   |    0    |
| PC33   |    0    |

Hodnota **id** je neměnná, typu TEXT. Hodnota **value** má hodnotu **0** pro označení vypnutého stavu, a **1** pro označení zapnutého stavu. Hodnota **value** je typu INT. Tuto tabulku je nutné si vytvořit ručně, například pomocí phpAdmina.
ID s označením **PC11,PC12,PC13** jsou pro **ovládání 1**. Ostatní zatím nejsou obsluhovány.
