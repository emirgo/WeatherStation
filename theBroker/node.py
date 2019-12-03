import time
import ttn
import base64
import pymysql
from pygame import mixer

connection = pymysql.connect(host='localhost',
                             user='root',
                             password='',
                             db='weatherstation',
                             charset='utf8mb4',
                             cursorclass=pymysql.cursors.DictCursor)
cursor = connection.cursor()
count = 0

app_id = "weatherstation8ball"
access_key = "ttn-account-v2.grmsMAXrCx0TzdWetgHS5ZkpM8bLpGn54oSqWn2Vxk8"

def uplink_callback(msg, client):
    print("[INFO] Received uplink from: ", msg.dev_id)
    msgenc = base64.b64decode(msg.payload_raw)
    splitmsg = (msgenc.decode('utf-8')).split(',')
    print("[RECEIVED]", splitmsg)
    mixer.init()
    mixer.music.load('D:\\1 UNIVERSITY\\ProejctSoftwareEngineering\\WeatherStation\\theBroker\\notification.mp3')
    mixer.music.play()
    query = "INSERT INTO `measurement` (`temperature`, `humidity`, `pressure`) VALUES (%s, %s, %s)"
    cursor.execute(query, (splitmsg[0], splitmsg[1], splitmsg[2]))
    connection.commit()
    count = 0

handler = ttn.HandlerClient(app_id, access_key)

mqtt_client = handler.data()
mqtt_client.set_uplink_callback(uplink_callback)
mqtt_client.connect()
print("  _____  ______  ___   _      _     ")
print(" |  _  | | ___ \/ _ \ | |    | |    ")
print("  \ V /  | |_/ / /_\ \| |    | |    ")
print("  / _ \  | ___ \  _  || |    | |    ")
print(" | |_| | | |_/ / | | || |____| |____")
print(" \_____/ \____/\_| |_/\_____/\_____/")
print("\tChanging the World one ball at a time.\n\n")
print("[INFO] Connected!")
while 1:
    time.sleep(5)
    count += 1
    if count > 7:
        print("[WARNING] Sensor(s) disconnected.")
        count = 0

