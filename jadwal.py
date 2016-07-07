#!/usr/bin/python
import MySQLdb
import time
from datetime import datetime  
from datetime import timedelta  
import os
import commands
import json
import requests

output = commands.getoutput('ps -A')
if 'mysqld' in output:
	# connect
	db = MySQLdb.connect(host="localhost", user="root", passwd="root",
	db="autoarjint")

	cursor = db.cursor()


def updatesql(id,nyala,timer_service,id_jadwal):
	if 'mysqld' in output:
		cursor2 = db.cursor()
		cursor2.execute("UPDATE controll SET nyala=%s WHERE id=%s" % (nyala,id))
		db.commit()	
		
		cursor3 = db.cursor()
		cursor3.execute("UPDATE jadwal SET timer_service=%s WHERE id=%s" % (timer_service,id_jadwal))
		db.commit()	
	
def byday(row):
	#waktusekarang
	day = json.loads(row[11])
	command=json.loads(row[16])
	now=time.strftime("%Y-%m-%d %H:%M:%S")
	#now=time.strftime('2014-01-12 19:20:25')
	#lamanyala
	l=row[10].split(':')
	tanggalstart0=time.strftime("%Y-%m-%d "+row[9])
	tanggalstart=str(time.strftime("%Y-%m-%d "+row[9]))
	finish= datetime.strptime(tanggalstart,'%Y-%m-%d %H:%M:%S') + timedelta(hours=int(l[0]),minutes=int(l[1]),seconds=int(l[2]))
	#hasil=str(hasil).split('.')
	#nyala
	#print now 
	if time.strftime("%A") in day:
		#print tanggalstart
		
		#print time.strftime("%A")	
		if  tanggalstart0 <= now and row[13]==0 and now<time.strftime(str(finish)):
			os.system("gpio mode %s out" % (row[14]))
			#os.system("gpio write %s 1" % (row[14]))
			os.system(command['on'])
			updatesql(row[0],1,1,row[15])
		#mati
		if  time.strftime(str(finish)) <= now and row[13]==1 and now>time.strftime(str(finish)):
			os.system("gpio mode %s out" % (row[14]))
			#os.system("gpio write %s 0" % (row[14]))
			os.system(command['off'])
			updatesql(row[0],0,0,row[15])
	

	
def custom(row):
	command=json.loads(row[16])
	st='%s %s' % (row[7],row[9])
	st2='%s %s' % (row[8],row[10])
	tanggalstart=time.strftime(str(st))
	finish=time.strftime(str(st2))
	now=time.strftime("%Y-%m-%d %H:%M:%S")
	#print now
	#print tanggalstart
	if  tanggalstart <= now and row[13]==0  and now<finish:
		if row[17]!='is_i2c':
			os.system("gpio mode %s out" % (row[14]))
		#os.system("gpio write %s 1" % (row[14]))
		os.system(command['on'])
		updatesql(row[0],1,1,row[15])
		#GPIO.output(row[12],True)
		#print int(row[14])
	
	#mati
	if  finish <= now and row[13]==1 and now>finish:
		if row[17]!='is_i2c':
			os.system("gpio mode %s out" % (row[14]))
		#os.system("gpio write %s 0" % (row[14]))
		os.system(command['off'])
		updatesql(row[0],0,0,row[15])
		#print 'OFF custom'


def lakukan():
	#time.sleep(0.4)
	if 'mysqld' in output:
		# execute SQL select statement
		cursor.execute("SELECT c.id, c.id_group, c.nama, c.aktif, c.gpio_no, c.nyala, j.timer_aktif, j.date_on, j.date_off, j.time_on, j.time_off, j.every_timer, j.`type`, j.timer_service, g.chip_addr,j.id as id_jadwal,g.command,g.is_i2c FROM controll c JOIN gpio g JOIN jadwal j ON c.gpio_no=g.id AND c.id=j.id_controll")
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

		
		cursor5 = db.cursor()
		cursor5.execute("SELECT * FROM controll WHERE nyala=1")
		db.commit()
		numrows5 = int(cursor5.rowcount)
		for x in range(0,numrows5):
			row5 = cursor5.fetchone()
			#print row5[0]
			link = "http://127.0.0.1/api/9d382a05cb5232415cc48621146f8eba/%s/1"% (row5[0])
			#print  link
			f = requests.get(link)
while True:
	lakukan()
