import time
import ttn

app_id = "weatherstation8ball"
access_key = "ttn-account-v2.grmsMAXrCx0TzdWetgHS5ZkpM8bLpGn54oSqWn2Vxk8"

def uplink_callback(msg, client):
    print("Received uplink from: ", msg.dev_id)
    print(msg)

handler = ttn.HandlerClient(app_id, access_key)

mqtt_client = handler.data()
mqtt_client.set_uplink_callback(uplink_callback)
mqtt_client.connect()
print("Making a connection please wait 5 seconds.")
time.sleep(5)
print("Connection made.")
mqtt_client.close()

app_client = handler.application()
my_app = app_client.get()
print("My app: ")
print(my_app)
my_devices = app_client.devices()
my_device = my_devices[0]
print(my_device) # gives lopy8ball work from here to get the data
