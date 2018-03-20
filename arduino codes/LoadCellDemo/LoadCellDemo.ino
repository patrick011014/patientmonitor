#include "HX711.h"

// object of load cell
HX711 cell(3, 2);

String key = "A03"; // unique key for every arduino
long load = 0;
int temp = 0;
int tempPin = 1;

void setup()
{
  Serial.begin(115200);
}

void loop() {
  
  Serial.print(key+"/");
  getLoadCell();
  getTemp();
  Serial.println("/");
  delay(1000);
  
}
void getLoadCell()
{
  load = (cell.read()-8267143)*0.001; // most recent reading
  int percent = int(load*100)/80;
  Serial.print( String(percent)+"/" );
}
void getTemp()
{
  temp = analogRead(tempPin);
  float mv = ( temp/1024.0)*5000; 
  float cel = mv/10;
  float farh = (cel*9)/5 + 32;
  
  Serial.print(cel);
}


