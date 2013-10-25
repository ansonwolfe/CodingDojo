class CrawlersController < ApplicationController
  def get
  	#require 'watir-webdriver'
	#require 'nokogiri'
	#require 'rubygems'

	b = Watir::Browser.new
	#b = Watir::Browser.new :chrome
	#b.goto 'https://www.linkedin.com/nhome/'
	b.goto 'https://www.linkedin.com/uas/login'
	b.text_field(:id =>'session_key-login').set 'jsprogam@yahoo.com'
	b.text_field(:id =>'session_password-login').set 'iloveu09'
	login = b.button(:name => 'signin')
	#login.exists?
	login.click


	l = b.link :text => 'Jobs'
	l.exists?
	l.click

	p = b.text_field(:id =>'job-search-box').set 'web developer'
	btn = b.button(:name => 'jsearch')
	btn.exists?
	btn.click

	# page_html = Nokigiri::HTML.parse('b.html')
	# links = page_html.css("a")
	# for i in 0..links.length-1 do
	# 	puts "hello"
	# end	
  end
end
