require 'rubygems'
require 'watir'

Watir::Browser.default = "firefox"

browser = Watir::Browser.start  "http://www.weather.com/"
browser.text_field(:id, "typeaheadBox").set("Palo Alto, California")
browser.text_field(:id, "typeaheadBox").set("Palo Alto, California")
browser.link(:text, "10 Day
").click
browser.link(:text, "10 Day
").click
