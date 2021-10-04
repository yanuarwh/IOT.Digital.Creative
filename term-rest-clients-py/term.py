import requests



i=1
while(i>=0):
	print("Temperature and Humidity Apps ")
	print("1. Add Room")
	print("2. Delete Room")

	Choose = input()

	while (Choose >'2' ):
		Choose = input("1 or 2 :")
	if Choose=='1' : 
		x=input("id :")
		y=''
		z=''
		while x== '' :
			x= input("id is required ,id :")
		payload ={'wpu-key' : 'wpu123','id':x,'temperature':y,'humidity':z}
		r= requests.post('http://localhost/rest-api/term-rest-server/api/temperature/post', data= payload )
		if r.status_code == 201:
			print ("Id has been added")
		else :
			print ("failed, Id already exist")
	elif Choose=='2' :
		x=input("id to be deleted:")
		payload ={'wpu-key' : 'wpu123','id':x,}
		r= requests.delete('http://localhost/rest-api/term-rest-server/api/temperature/delete', data= payload )
		if r.status_code == 204:
			print ("deleted")
		else :
			print ("failed, Id does not exist")

