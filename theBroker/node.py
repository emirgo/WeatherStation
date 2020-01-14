#
# Author: Emirhan Gocturk
# Date: 25 November 2019
# Contributors: Frank - Alikhan - Midas
# Description: Listens to TTN and executes uplink_callback to store
#               in coming information into the MySQL database.
#

import time
import datetime
import ttn
import base64
import pymysql
from pygame import mixer

# Database connection
connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='weatherstation',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
cursor = connection.cursor()
count = 0 # Used for time out on uplink connection

# TTN app credentials
app_id = "weatherstation8ball"
access_key = "ttn-account-v2.grmsMAXrCx0TzdWetgHS5ZkpM8bLpGn54oSqWn2Vxk8"

# Executes when receives a data from the uplink and stores data into database
def uplink_callback(msg, client):
    print("[INFO] Received uplink from: ", msg.dev_id)

    # Decode and split message received into 4 pieces
    msgenc = base64.b64decode(msg.payload_raw)
    splitmsg = (msgenc.decode('utf-8')).split(',')
    print("[RECEIVED]", splitmsg)

    # Play the notification sound
    mixer.init()
    mixer.music.load('D:\\1 UNIVERSITY\\ProejctSoftwareEngineering\\WeatherStation\\theBroker\\notification.mp3')
    mixer.music.play()

    # Prepare the query
    query = "INSERT INTO `measurements` (`temperature`, `humidity`, `pressure`, `light`, `date_added`) VALUES (%s, %s, %s, %s, %s)"
    # Get time of now [Greenwich Meridian]
    timeNow = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    print("[TIMESTAMP] ",timeNow)
    # Execute the query
    cursor.execute(query, (splitmsg[0], splitmsg[1], splitmsg[2], splitmsg[3], timeNow));
    # Commit query - meaning that database will reflect executed query
    connection.commit()
    # Reset count to 0 as we don't want it to time out anymore
    count = 0
    print("<===============================>")

# Create the handler for TTN
handler = ttn.HandlerClient(app_id, access_key)

# Setup MQTT client
mqtt_client = handler.data()
mqtt_client.set_uplink_callback(uplink_callback)
mqtt_client.connect()

# Display into message
print("  _____  ______  ___   _      _     ")
print(" |  _  | | ___ \/ _ \ | |    | |    ")
print("  \ V /  | |_/ / /_\ \| |    | |    ")
print("  / _ \  | ___ \  _  || |    | |    ")
print(" | |_| | | |_/ / | | || |____| |____")
print(" \_____/ \____/\_| |_/\_____/\_____/")
print("\tChanging the World one ball at a time.\n\n")
print("[INFO] Connected!")

# Loop to wait for a callback
while 1:
    time.sleep(5)
    count += 1

    # Time out
    if count > 8:
        print("[WARNING] Sensor(s) disconnected.")
        count = 0

