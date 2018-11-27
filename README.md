REMOTER
-------

Vzdálené ovládání zařízení přes web pomocí MySQL.

Testováno na desce Wemos D1- D1 mini, D1 mini Lite    (ESP8266)

Typ testovacího relé: JQC3F-05VDC-C


Ve složce Web se nachází ovládací část, která se kopíruje na webhosting

Ve složce PCremote se nachází zdroják pro zapínání/vypínání PC, který se nahraje do desky (wemosky)



PCremote:

Pro úspěšné přelinkování je zapotřebí stáhnout knihovnu MySQL Connector Arduino by Charles Bell v1.1.1.

Před linkováním nastavit údaje pro Wifi v úvodu zdrojáku.

V další části zdrojáku lze nastavit časy/délku pro spínání relé a pin pro jeho ovládání.

Defaultní hodnoty pro relé:

Pin: D1

Čas zapnutí: 500 milisekund

Čas vypnutí: 8000 milisekund



Dále pak je možné nastavovat databázi MySQL
