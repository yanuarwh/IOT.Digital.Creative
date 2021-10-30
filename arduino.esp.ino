
#include <ArduinoJson.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266HTTPClient.h>// mengaktifkan mode Station
const char* ssid = "yanuar 10"; //nama ssid
const char* password = "wiriyanadi"; //paswordssid

#define echoPin 2 // Echo Pin sensor ultrasonic
#define trigPin 0 // Trigger Pin sensor ultrasonic
long duration, distance=0; // Duration used to calculate distance

WiFiClient client;
HTTPClient http;


void setup(){
// pinMode(led, OUTPUT);
// digitalWrite(led, 0);
Serial.begin(115200); //baud rate serial monitor

WiFi.begin(ssid, password);
Serial.println("");

pinMode(trigPin, OUTPUT);
pinMode(echoPin, INPUT);
 Serial.println("ggwp.asik");
// Wait for connection
while (WiFi.status() != WL_CONNECTED) {
delay(500);
Serial.print(".");
}

Serial.println("");
Serial.print("Connected to "); //informasi ssid AP
Serial.println(ssid);
Serial.print("IP address: "); //informasi IP address yang diperoleh esp
Serial.println(WiFi.localIP());



}



void loop(){
  

digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);
duration = pulseIn(echoPin, HIGH);
//Calculate the distance (in cm) based on the speed of sound.
distance = duration*0.034/2; // menghitung jarak
Serial.println(distance);
//Delay 50ms before next reading.
delay(250); // seperempat detik


String host="http://192.168.0.106/rest-api/term-rest-server/api/water_level";
//"http://192.168.211.10/rest-api/term-rest-server/api/water_level"
http.begin(client,host);




http.addHeader("Content-Type","application//json");
http.addHeader("wpu-key","wpu123");
//x-www-form-urlencoded

//StaticJsonDocument  <200>doc ;
StaticJsonBuffer<300> JSONbuffer;   //Declaring static JSON buffer
JsonObject& JSONencoder = JSONbuffer.createObject();
int x=1;

JSONencoder["id"] =x;
JSONencoder["Water_level"] =distance;
char JSONmessageBuffer[300];
JSONencoder.prettyPrintTo(JSONmessageBuffer, sizeof(JSONmessageBuffer));
Serial.println(JSONmessageBuffer);
//String json;
//serializeJson(doc, json);

int httpCode=http.PUT(JSONmessageBuffer);
String payload = http.getString();
Serial.println(httpCode);
Serial.println(payload);
Serial.println(JSONmessageBuffer);
http.end();



}
