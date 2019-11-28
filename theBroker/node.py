import paho.mqtt.client as mqtt
import time as tm

# logging function that prints behaviour in console
def on_log(client, userdata, level, buf):
    print("[LOG] " + buf)

# connection function that makes the connection behaviour printable
def on_connect(client, userdata, flags, rc):
    if rc == 0:
        print("[CONNECTION] OK")
    else:
        print("[CONNECTION] Bad connection returned code: ", rc)

def on_disconnect(client, userdata, flags, rc = 0):
    print("[CONNECTION] Disconnected result code " + str(rc))

def on_message(client, userdata, msg):
    topic = msg.topic
    m_decode = str(msg.payload.decode("utf-8", "ignore"))
    print("[MESSAGE] ", m_decode)

broker = "mqtt.eclipse.org"
client = mqtt.Client("8balltechnologies")

client.on_connect = on_connect
client.on_disconnect = on_disconnect
# client.on_log = on_log
client.on_message = on_message
print("[INFO] Connecting to broker ", broker)

client.connect(broker)
client.loop_start()
client.subscribe("house/sensor1")
client.publish("house/sensor1", "my first message")
time.sleep(4)
client.loop_stop()
client.disconnect()
