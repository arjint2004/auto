import smbus
 
bus = smbus.SMBus(1) # For revision 1 Raspberry Pi, change to bus = smbus.SMBus(1) for revision 2.

address = 0x20 # I2C address of MCP23017


flag=0
add=0x00
import time
while flag<400:
  time.sleep(0.1)
  flag=flag+1
  value = bus.read_byte_data(address,0x12)
  print flag
  add=add+0x01
  if add == flag:
	bus.write_byte_data(0x20,0x12,add) # Set all of bank A to outputs
  elif add ==flag:
    bus.write_byte_data(0x20,0x12,add) # Set all of bank A to outputs
	
    
  
