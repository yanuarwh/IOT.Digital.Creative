import requests
import datetime





temp="10"
humid="10"
dt_now = datetime.datetime.now()
x="1"
payload ={'wpu-key' : 'wpu123','id':x,'temperature':temp,'humidity':humid,'Last-Updated':dt_now}
r= requests.put('http://localhost/rest-api/term-rest-server/api/temperature/put', data= payload )
