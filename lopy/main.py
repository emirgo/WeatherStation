## Author : Edric & Alikhan
## Project Software Engineering
## Group : 8Ball Technology
## LoPy Firmware
## Date : 22 Nov 2019

from network import LoRa                                                        # For operation of Lora network
from lib.pysense import Pysense                                                 # Needed to operate anything on the Pysense expansion
from LIS2HH12 import LIS2HH12
from SI7006A20 import SI7006A20
from LTR329ALS01 import LTR329ALS01
from MPL3115A2 import MPL3115A2,ALTITUDE,PRESSURE
import pycom                                                                    # Base library for Pycom devices
import socket                                                                   # Needed to connect two nodes on a network to communicate with each other
import time                                                                     # Allows use of time.sleep() for delays
import binascii                                                                 # Allows convertion between binary and various ASCII-encoded binary representations

# Setting up Lora application
lora = LoRa(mode=LoRa.LORAWAN)
app_eui = binascii.unhexlify('70B3D57ED0026466')                                # application EUI
app_key = binascii.unhexlify('0866572ED4A888E46BE5B9BF0084118F')                # application KEY

lora.join(activation=LoRa.OTAA, auth=(app_eui, app_key), timeout=0)             # connect to the application

# make a connection to TTN network
while not lora.has_joined():
    time.sleep(2.5)
    print('Not joined yet...')
    pycom.heartbeat(False)                                                      # Disable the on-board heartbeat (blue flash every 4 seconds)
    pycom.rgbled(0xffc0cb)                                                      # Sets RGB to a weird pink while not connected

print('Network joined!')                                                        # Prints network joined when network is joined
pycom.rgbled(0x00ff00)                                                          # Sets RGB to green when connected

py = Pysense()
mp = MPL3115A2(py,mode=ALTITUDE)                                                # Sensor returns height in meters. Mode may also be set to PRESSURE
si = SI7006A20(py)                                                              # Sensor returns temperature in C
lt = LTR329ALS01(py)                                                            # Sensor returns ambient light
li = LIS2HH12(py)
mpp = MPL3115A2(py,mode=PRESSURE)                                               # Sensor returns height in meters. Mode may also be set to PRESSURE

#Creating and configuring a socket
ttn = socket.socket(socket.AF_LORA, socket.SOCK_RAW)
ttn.setsockopt(socket.SOL_LORA, socket.SO_DR, 5)                                # Data rate set to 5
ttn.setblocking(False)

while 1:
    temp2 = (str(si.temperature()))                                             # Temperature in C
    humid = (str(si.humidity()))                                                # Calculated relative humidity given current temperature
    press = (str(mpp.pressure()/100))                                           # Pressure in Milibars
    light = (str(((lt.lux())*0.09290304*50)/100))
    data = temp2 + "," + humid + "," + press + "," + light                                   # Creating string with all sensor readings
    ttn.send(data)                                                              # Send the measured readings in a string file

    print(light)                                                               # Prints sent whenever the data is sent to the TTN
    time.sleep(30)
