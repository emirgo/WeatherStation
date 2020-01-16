//
//  ViewController.swift
//  WeatherStationWebView
//
//  Created by Frank Wolff on 03/12/2019.
//  Copyright © 2019 Frank Wolff. All rights reserved.
//

import UIKit
import WebKit

class ViewController: UIViewController, WKUIDelegate, WKNavigationDelegate {
    
    var webView: WKWebView!
	
	// Configure the main view as WKWebView so that it can display the Weatherstation website.
    override func loadView() {
        let webConfiguration = WKWebViewConfiguration()
        webView = WKWebView(frame: .zero, configuration: webConfiguration)
        webView.uiDelegate = self
		webView.navigationDelegate = self
		
        view = webView
    }
	
	// First function that is called after the view is loaded.
    override func viewDidLoad() {
        super.viewDidLoad()
		tryReloadingSite()
		view.accessibilityIdentifier = "Main View"
    }
	
	// Tries to load site, if it is down / can't connect if will call the didFailProvisionalNavigation function.
	func tryReloadingSite() {
		let serverURL = URL(string: "http://84.82.162.221:2004/WeatherStation/webapp/center.php")
		// Wrong URL for testing error messages.
		let wrongOnPurposeURL = URL(string: "https://www.dasodsanfasnfoakfadfjo.nl/")
		
        let myRequest = URLRequest(url: serverURL!)
        webView.load(myRequest)
		print("Try reloading site function run.")
	}
	
	// Function that gets called when a website loading error occurs. This will present the custom error view window.
	func webView(_ webView: WKWebView, didFailProvisionalNavigation navigation: WKNavigation!, withError error: Error) {
		print("Error function run.")
		
		let vc = self.storyboard?.instantiateViewController(withIdentifier: "ErrorViewController") as! ErrorViewController
		self.present(vc, animated: true, completion: nil)
	}
	
}
