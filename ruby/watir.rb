require 'watir-webdriver'
require 'nokogiri'
require 'rubygems'

browser = Watir::Browser.new
browser.goto 'https://www.linkedin.com/nhome/'
browser.text_field(:id =>'session_key-login').set 'gayabhaskar@gmail.com'
browser.text_field(:id =>'session_password-login').set 'oscarfelix'
login = browser.button(:name => 'signin')
login.exists?
login.click


l = browser.link :text => 'Jobs'
l.exists?
l.click

p = browser.text_field(:id =>'job-search-box').set 'web developer'
btn = browser.button(:name => 'jsearch')
btn.exists?
btn.click

page_html = Nokigiri::HTML.parse('browser.html')
links = page_html.css("a")
for i in 0..links.length-1 do
	puts link
end	

