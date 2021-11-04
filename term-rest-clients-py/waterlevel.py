import requests



i=1
while(i>=0):
	print("IOT CV Digital Creative Apps ")
	print("1. Add Water Storage")
	print("2. Delete  Water Storage")

	Choose = input()

	while (Choose >'2' ):
		Choose = input("1 or 2 :")
	if Choose=='1' : 
		x=input("id :")
		y=''
		
		while x== '' :
			x= input("id is required ,id :")
		payload ={'wpu-key' : 'wpu123','id':x,'Water_level':y}
		r= requests.post('http://localhost/rest-api/term-rest-server/api/water_level/post', data= payload )
		if r.status_code == 201:
			print ("Id has been added")
		else :
			print ("failed, Id already exist")
	elif Choose=='2' :
		x=input("id to be deleted:")
		payload ={'wpu-key' : 'wpu123','id':x,}
		r= requests.delete('http://localhost/rest-api/term-rest-server/api/water_level/delete', data= payload )
		if r.status_code == 204:
			print ("deleted")
		else :
			print ("failed, Id does not exist")

