#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>

// Wifi module credentials
const char* ssid = "81d6b1";
const char* password = "241529861";

// Holds data from arduino
char command;
String string="";
 
int ledPin = D5;
WiFiServer server(80);
 
void setup() {
  Serial.begin(115200);
//  Serial.begin(9600);
  delay(10);
 
 
  pinMode(ledPin, OUTPUT);
  digitalWrite(ledPin, LOW);
 
  // Connect to WiFi network
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
 
  WiFi.begin(ssid, password);
 
  while (WiFi.status() != WL_CONNECTED)
  {
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.println("WiFi connected");
 
  // Start the server
  server.begin();
  Serial.println("Server started");
 
  // Print the IP address
  Serial.print("Wifi module URL : ");
  Serial.print("http://");
  Serial.print(WiFi.localIP());
  Serial.println("/");
 
}
 
void loop() {
  string = "";
  receiveString();
  sendDataToBeInserted();
  delay(1000);
 
}
void sendDataToBeInserted()
{
  Serial.println("sending...");
  if(WiFi.status()== WL_CONNECTED)
  {   
 
    HTTPClient http;
    String url = "http://192.168.0.14/arduino/insert?data="+string;
    http.begin(url);
    int httpCode = http.GET();
    String response = http.getString();
    
    Serial.println("Response: "+response);
    Serial.println("URL: "+url);
    Serial.println("Data: "+string);
    http.end();  
 
   }
   else
   {
      Serial.println("Error in WiFi connection");   
   }
   Serial.println("sended");
}
void receiveString()
{
  Serial.println(string);
  if(Serial.available()>0){
    string="";
  }
  while(Serial.available()>0)
  {
    command=((byte)Serial.read());
    if(command==':')
    {
      break;
    }
    else
    {
      string+=command;
    }
  }
}
