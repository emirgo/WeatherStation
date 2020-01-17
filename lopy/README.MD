# PYCOM

## Introduction
This repository contains out of the box examples for Pycom devices, including Pysense, step by step installation guide and sample code to get the LoPy running. This code is designed to run on a PyCom board with additional PySense 

To work along with this tutorial, you'll need the following:

* [Pycom Pysense](https://core-electronics.com.au/pycom-pysense-41969.html)
* [Any Pycom microcontroller](https://core-electronics.com.au/pycom.html)
* Antennae for radios not using on-board antennae
* A micro-USB cable connected to a PC/Laptop

Third party libraries that have been used:
- LoRa
- socket

## Getting started:
Since the pymakr plugin is required to upload the code to the board, either Atom or Visual Studio Code can be used. For this tutorial we will be using Atom.
A more in-depth guide for getting the environment running can be found here:
https://docs.pycom.io/pymakr/installation/

## Setting up the LoPy
1. Click the green Clone or Download button, then click Download ZIP (Assuming the file is then located into your Downloads folder)
2. Open your Downloads folder and extract the file
3. Now we'll open Atom IDE
4. In Atom, from the **File** menu, click **Open Folder** and navigate to the extracted file
5. In between the two panels on the right, there's a **More** button. Click that, then **Get Serial Ports**
6. Plug in your Pycom device if you haven't already
7. Check that the antenna is connected, and also check that the PyCom firmware is updated to the latest version
8. **Get Serial Ports** now shows me the serial port number for my Pysense
9. Click **Settings** then **Project Settings** and make sure the appropriate COM port number is entered in the "address" field. Then save the settings (Ctrl-S)
10. Hit **Connect**
11. Hit **Upload** to get the sample code started on your device

## Setting up TTN connection
1. Register on the TTN website: https://docs.pycom.io/gettingstarted/installation/firmwaretool/
2. Create an application, make a unique ID, and then register a device. Application EUI and Application key are required to make the connection.
3. Go into applications -> Devices -> Your device 
![](https://i.gyazo.com/71079422c7fd93a85060df36c930a390.png)
5. Paste the credentials into the following lines in the code:
python

## Setting up LoRa application
```
lora = LoRa(mode=LoRa.LORAWAN)
app_eui = binascii.unhexlify('70B3D57ED0026466')                        
app_key = binascii.unhexlify('0866572ED4A888E46BE5B9BF0084118F')
```

