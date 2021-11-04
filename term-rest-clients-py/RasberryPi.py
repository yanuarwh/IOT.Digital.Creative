import requests
import datetime

import Adafruit_DHT

DHT_SENSOR = Adafruit_DHT.DHT22
DHT_PIN = 4

while True:
    temperature, humidity = Adafruit_DHT.read_retry(DHT_SENSOR, DHT_PIN)

    if humidity is not None and temperature is not None:
       temp={0:0.1f} humid={1:0.1f} format(temperature, humidity)

   

dt_now = datetime.datetime.now()
x="1"
payload ={'wpu-key' : 'wpu123','id':x,'temperature':temp,'humidity':humid,'Last-Updated':dt_now}
r= requests.put('http://192.168.18.65/rest-api/term-rest-server/api/temperature/put', data= payload )
