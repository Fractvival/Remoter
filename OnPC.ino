// PC REMOTER
// 11/2018
///////////////////////////////////////////
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
//#include <MySQL_Encrypt_Sha1.h>
//#include <MySQL_Packet.h>
#include <ESP8266WiFi.h>
/*
$servername = "c102um.forpsi.com";
$username = "f74453";
$password = "sql39711793";
$dbname = "f74453";
*/
// DATA K PRIHLASENI DO DATABAZE MYSQL
IPAddress sql_ipaddr(52,29,239,198);          // IP of the MySQL *server* here
char sql_user[] = "sql7267198";                 // MySQL user login username
char sql_pass[] = "zzN1qyBNmf";              // MySQL user login password
char sql_data[] = "sql7267198";

char ssid[] = "MyWifi";                   // SSID
char pass[] = "121212121212";             // SSID Password

WiFiClient client;                        // Use this for WiFi instead of EthernetClient
MySQL_Connection conn(&client);
MySQL_Cursor* cursor;

#define MAX_FAILED_CONNECTS 5
long num_fails = 0;
row_values *row = NULL;
column_names *columns = NULL;

void setup() 
{
  Serial.begin(9600);
  Serial.print("\n* PC REMOTER startuje\n");

  WiFi.mode(WIFI_STA);
  // Vypis informaci o wifi na konzolu
  Serial.print("* Budu se pripojovat k wifi: ");
  Serial.print(ssid);
  Serial.print(" [");
  Serial.print(pass);
  Serial.println("]");
  Serial.print("* Pripojuji.");
  // Zahajeni spojeni
  WiFi.begin(ssid,pass);
  // Pockame na spojeni s wifi s kontrolou neuspechu
  // Pokud spojeni neprobehne ve stanovenem poctu pokusu, ukonci smycku
  while (WiFi.status() != WL_CONNECTED) 
  { 
    delay(500);
    Serial.print(".");
  }
  // Po navazani spojeni vypis info do konzoly  
  Serial.print("OK!\n\n");  
  Serial.print("* Testuji pristupnost databaze\n");
  if (conn.connect(sql_ipaddr, 3306, sql_user, sql_pass)) 
  {
    Serial.print("* Databaze pripravena!\n");
    Serial.print("* Vse OK\n\n");
  }
  else
  {
    Serial.print("* Databaze je nedostupna!\n");
    Serial.print("* Opakuji proces...\n\n");
    return;
  }
}

void soft_reset() 
{
  ESP.reset();//asm volatile("jmp 0");
}

void loop() 
{
  delay(1000);
  if (conn.connected()) 
  {
    num_fails = 0;
    cursor = new MySQL_Cursor(&conn);
    /////////////////////////////////
    cursor->execute("SELECT * FROM sql7267198.table WHERE 1");
    columns = cursor->get_columns();
    for (int f = 0; f < columns->num_fields; f++) 
    {
      Serial.print(columns->fields[f]->name);
      if (f < columns->num_fields-1) 
      {
        Serial.print(',');
      }
    }
    Serial.println();
    do {
      row = cursor->get_next_row();
      if (row != NULL) 
      {
        for (int f = 0; f < columns->num_fields; f++) 
        {
          Serial.print(row->values[f]);
          if (f < columns->num_fields-1) 
          {
            Serial.print(',');
          }
        }
        Serial.println();
      }
     } while (row != NULL);
    delete cursor;
  }
  else
  {
    conn.close();
    Serial.println("* Obnovuji spojeni s databazi...");
    if (conn.connect(sql_ipaddr, 3306, sql_user, sql_pass)) 
    {
      delay(500);
      Serial.println("* Spojeni obnoveno!");
      num_fails++;
      if (num_fails == MAX_FAILED_CONNECTS) 
      {
        Serial.println("* Ok, je cas provest restart...");
        delay(2000);
        soft_reset();
      }
    }
  }
}
