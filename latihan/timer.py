#!/usr/bin/python
import MySQLdb
import time
from datetime import datetime  
from datetime import timedelta  
import os

import json

# connect
db = MySQLdb.connect(host="localhost", user="root", passwd="raspberry181804",
db="autoarjint")

cursor = db.cursor()


def updatesql(id,nyala):
	cursor2 = db.cursor()
	cursor2.execute("UPDATE controll SET nyala=%s WHERE id=%s" % (nyala,id))
	# commit your changes
	db.commit()	
	
def byday(row):
	#waktusekarang
	day = json.loads(row[11])
	now=time.strftime("%Y-%m-%d %H:%M:%S")
	#now=time.strftime('2014-01-01 16:27:00')
	#lamanyala
	l=row[10].split(':')
	tanggalstart0=time.strftime("%Y-%m-%d "+row[9])
	tanggalstart=str(time.strftime("%Y-%m-%d "+row[9]))
	finish= datetime.strptime(tanggalstart,'%Y-%m-%d %H:%M:%S') + timedelta(hours=int(l[0]),minutes=int(l[1]),seconds=int(l[2]))
	#hasil=str(hasil).split('.')
	#nyala

	if time.strftime("%A") in day:
		#print tanggalstart
		#print row[0] 
		#print time.strftime("%A")	
		if  tanggalstart0 <= now and row[5]==0 and now<time.strftime(str(finish)):
			os.system("gpio mode %s out" % (row[13]))
			os.system("gpio write %s 1" % (row[13]))
			updatesql(row[0],1)
		
		#mati
		if  time.strftime(str(finish)) <= now and row[5]==1 and now>time.strftime(str(finish)):
			os.system("gpio mode %s out" % (row[13]))
			os.system("gpio write %s 0" % (row[13]))
			updatesql(row[0],0)
	

	
def custom(row):
	st='%s %s' % (row[7],row[9])
	st2='%s %s' % (row[8],row[10])
	tanggalstart=time.strftime(str(st))
	finish=time.strftime(str(st2))
	now=time.strftime("%Y-%m-%d %H:%M:%S")
	#print now
	#print tanggalstart
	if  tanggalstart <= now and row[5]==0:
		os.system("gpio mode %s out" % (row[13]))
		os.system("gpio write %s 1" % (row[13]))
		updatesql(row[0],1)
		#GPIO.output(row[12],True)
		#print int(row[13])
	
	#mati
	if  finish <= now and row[5]==1:
		os.system("gpio mode %s out" % (row[13]))
		os.system("gpio write %s 0" % (row[13]))
		updatesql(row[0],0)
		#print 'OFF custom'


def lakukan():
	#time.sleep(0.4)
	# execute SQL select statement
	cursor.execute("SELECT controll.*, gpio.chip_addr FROM controll JOIN gpio ON controll.gpio_no=gpio.id")
	# commit your changes
	db.commit()		
	# get the number of rows in the resultset
	numrows = int(cursor.rowcount)
	for x in range(0,numrows):
		row = cursor.fetchone()
		if  row[12]== 'byday':
			byday(row)
		elif  row[12]== 'schedulled':
			custom(row)

	
while True:
	lakukan()
