// PC REMOTER
// 11/2018
///////////////////////////////////////////

#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
#include <ESP8266WiFi.h>


// DATA K PRIHLASENI DO DATABAZE MYSQL
//************************************
// IP adresa MySQL serveru
IPAddress sql_ipaddr(52,29,239,198);
// Prihlasovaci jmeno
char sql_user[] = "sql7267198";
// Heslo
char sql_pass[] = "zzN1qyBNmf";

// UDAJE K PRIHLASENI NA SIT WIFI
//************************************
// Nazev wifi
char ssid[] = "VanillkaNET";
// Heslo wifi
char pass[] = "0420792433240";

// OZNACENI PINU PRO RELE A CASY [ms]
//************************************
int relayPin  = D1;
int onDelay   = 500;
int offDelay  = 5000;


//////////////////////////////////////////////////////
//////////////////////////////////////////////////////

WiFiClient client;
MySQL_Connection conn(&client);
MySQL_Cursor* cursor;

// Pocet chybnych prihlaseni 
// k databazi pred reloginem
#define MAX_FAILED_CONNECTS 5

long num_fails = 0;
row_values *row = NULL;
column_names *columns = NULL;

int stateButton[9] = {0};

void runRelay( bool On = true )
{
  if ( On )
  {
    digitalWrite(relayPin, HIGH);
    delay(onDelay);  
    digitalWrite(relayPin, LOW);
  }
  else
  {
    digitalWrite(relayPin, HIGH);
    delay(offDelay);  
    digitalWrite(relayPin, LOW);
  }
}


void setup() 
{
  Serial.begin(9600);
  Serial.print("\n* PC REMOTER startuje\n");

  pinMode(relayPin, OUTPUT);

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
    memset(&stateButton, 0, sizeof(int)*9 );
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
    int deltaButton = 0;
    do {
      row = cursor->get_next_row();
      if (row != NULL) 
      {
        for (int f = 0; f < columns->num_fields; f++) 
        {
          Serial.print(row->values[f]);
          if ( strcmp(row->values[f],"0" ) == 0 )
          {
            stateButton[deltaButton] = 0;
            deltaButton++;
          }
          else if ( strcmp(row->values[f],"1") == 0 )
          {
            stateButton[deltaButton] = 1;
            deltaButton++;
          }
          else
          {}
          if (f < columns->num_fields-1) 
          {
            Serial.print(',');
          }
        }
        Serial.println();
      }
     } while (row != NULL);

    if ( stateButton[0] == 1 )
    {
      Serial.println("* DETEKCE OVLADANI 1:  ZAPNOUT");
      Serial.print("* Kvituji pozadavek...");
      cursor->execute("UPDATE sql7267198.table SET value=0 WHERE id='PC11'");
      Serial.println("OK");
      runRelay();      
    }

    if ( stateButton[1] == 1 )
    {
      Serial.println("* DETEKCE OVLADANI 1:  VYPNOUT");
      Serial.print("* Kvituji pozadavek...");
      cursor->execute("UPDATE sql7267198.table SET value=0 WHERE id='PC12'");
      Serial.println("OK");
      runRelay(false);
    }

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
