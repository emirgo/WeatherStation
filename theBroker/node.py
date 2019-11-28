import time
import ttn
import json
import base64

app_id = "weatherstation8ball"
access_key = "ttn-account-v2.grmsMAXrCx0TzdWetgHS5ZkpM8bLpGn54oSqWn2Vxk8"

def uplink_callback(msg, client):
    print("Received uplink from: ", msg.dev_id)
    print(base64.b64decode(msg.payload_raw))


handler = ttn.HandlerClient(app_id, access_key)

mqtt_client = handler.data()
mqtt_client.set_uplink_callback(uplink_callback)
mqtt_client.connect()
print("Connected!")
while 1:
    time.sleep(1)
