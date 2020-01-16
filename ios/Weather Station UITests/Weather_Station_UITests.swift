//
//  Weather_Station_UITests.swift
//  Weather Station UITests
//
//  Created by Frank Wolff on 10/01/2020.
//  Copyright © 2020 Frank Wolff. All rights reserved.
//

import XCTest

class Weather_Station_UITests: XCTestCase {
	
    override func setUp() {
        // Put setup code here. This method is called before the invocation of each test method in the class.
		super.setUp()
        // In UI tests it is usually best to stop immediately when a failure occurs.
        continueAfterFailure = false

        // In UI tests it’s important to set the initial state - such as interface orientation - required for your tests before they run. The setUp method is a good place to do this.
    }

    override func tearDown() {
        // Put teardown code here. This method is called after the invocation of each test method in the class.
		super.tearDown()
    }
	
	// Test that checks if the app is launched correctly.
	func testAppIsEnabled() {
		let app = XCUIApplication()
		app.launch()
		XCTAssertTrue(app.isEnabled)
	}
	
	// Test that checks if the main (web) view is loaded correctly (or if not, if the error view is loaded correctly).
	func testViewIsLoaded() {
		let app = XCUIApplication()
		app.launch()
		let viewIsLoaded = app.otherElements["Main View"].exists || app.otherElements["Error View"].exists
		XCTAssertTrue(viewIsLoaded)
	}
	
}
