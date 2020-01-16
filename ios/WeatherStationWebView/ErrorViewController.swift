//
//  ErrorViewController.swift
//  WeatherStationWebView
//
//  Created by Frank Wolff on 05/12/2019.
//  Copyright © 2019 Frank Wolff. All rights reserved.
//

import Foundation
import UIKit

// The class that gets used when the website has a loading error.
class ErrorViewController : UIViewController {
	
	// The UI elements that are positioned in Main.storyboard
	@IBOutlet weak var errorTypeLabel: UILabel!
	@IBOutlet weak var errorLabel: UILabel!
	@IBOutlet weak var tryAgainButton: UIButton!
	
	// Displays the error message when the view gets loaded.
	override func viewDidLoad() {
		errorLabel.text = "Couldn't load web page."
		errorTypeLabel.text = "An error occured:"
		print("ErrorViewController loaded.")
		view.accessibilityIdentifier = "Error View"
	}
	
	// Function that gets called when the button is pushed.
	@IBAction func tryAgainButtonPushed(_ sender: UIButton) {
		self.dismiss(animated: true, completion: nil)
	}

}
