#install ruby
#install watir-webdriver and read Browser Elements section (http://watirwebdriver.com/)
#run this file with 'ruby trey.rb'

#import gem watir-webdriver
require 'watir-webdriver'

#open new browser in firefox; store in variable 'b'
b = Watir::Browser.new:firefox
puts 'opened firefox browser'

#open espn.com in new firefox broswser
b.goto('espn.com')
puts 'opened espn.com'

#sleep for 2 cycles; purpose: wait for element to load or simulate human patterns
sleep(2)
puts 'sleep for 2 cycles'

#type 'Rory' in the text field with id 'searchString'
b.text_field(:id => 'searchString').set('Rory')
puts 'searched "Rory"'

#click button with class 'submit'
b.button(:class => 'submit').click
puts 'clicked submit'