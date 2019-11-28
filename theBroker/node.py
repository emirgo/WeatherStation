import time
import ttn

app_id = "weatherstation8ball"
access_key = "ttn-account-v2.grmsMAXrCx0TzdWetgHS5ZkpM8bLpGn54oSqWn2Vxk8"

def uplink_callback(msg, client):
  print("Received uplink from ", msg.dev_id)
  print(msg)

handler = ttn.HandlerClient(app_id, access_key)

# using mqtt client
# mqtt_client = handler.data()
# mqtt_client.set_uplink_callback(uplink_callback)
# time.sleep(60)
# mqtt_client.close()

# using application manager client
app_client = handler.application()
my_app = app_client.get()
print(my_app)
my_devices = app_client.devices()
print(my_devices)