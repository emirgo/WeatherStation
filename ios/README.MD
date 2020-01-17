# IOS App

### Introduction
The application for the weatherstation is a native iOS application that loads a responsive version of the weatherstation website and displays it in fullscreen. If the website cannot be loaded (because the server is down / can’t be reached), the app will display an error view and a button to try to connect again.

### Getting started
The iOS app store is restricted by Apple (you need to pay a fee for a developer account and the app needs to be approved). That’s why the app has to be loaded from the developer computer via a cable. To do this you need to have access to the following:

• Mac computer with Xcode installed (free from the Mac app store).
• An iPhone with iOS 13.2 or higher (if you don’t have one you can run the app in the simulator).

Now follow these steps to run the app:
1.	In a terminal run: git clone https://github.com/frankwolffnl/WeatherStationWebView
2.	Double click WeatherStationWebView.xcodeproj to open Xcode.
3.	Connect your iPhone to the computer using a cable.
4.	In the upper left corner click target and select your device (or select a simulator device).
5.	Click run and your device should download and run the app (you may have to accept development settings on the device first).
6.	Now you can disconnect your device and the app will remain installed.

### Technical explanation
The application consists of two main view views: the main WKWebView declared in ViewController.swift and the error message UIViewController declared in ErrorViewController.swift. The main view tries to connect to the weatherstation web server and display the graphs. If it cannot connect for some reason it will load the error view and a button to try to load again. The layout for the UI elements of the error view is defined in Main.storyboard.

### UI Tests
The UI tests are defined in Weather_Station_UITests.swift. They test whether or not the app loads correctly and if it displays one of the two specific views. To run the test class you need to open it in Xcode and click on the little square on the left of the class name. If you want to run the test individually you need to click on the square left to the test method name.













License
----

MIT
