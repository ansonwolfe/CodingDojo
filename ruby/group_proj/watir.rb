require 'watir-webdriver'
b = Watir::Browser.new
b.goto 'https://www.linkedin.com/nhome/'
b.text_field(:id =>'session_key-login').set 'bonny.lai@gmail.com'
b.text_field(:id =>'session_password-login').set 'canislupus'
b.button(:name => 'signin').click


