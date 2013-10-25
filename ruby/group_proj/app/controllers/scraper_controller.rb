class ScraperController < ApplicationController
  def get

		# require 'watir-webdriver'
		# require 'nokogiri'
		# require 'rubygems'

		b = Watir::Browser.new
		# b.visible = false
		b.goto 'https://www.linkedin.com/nhome/'
		b.text_field(:id =>'session_key-login').set 'gayabhaskar@gmail.com'
		b.text_field(:id =>'session_password-login').set 'oscarfelix'
		login = b.button(:name => 'signin')
		login.exists?
		login.click


		l = b.link :text => 'Jobs'
		l.exists?
		l.click

		p = b.text_field(:id =>'job-search-box').set 'java'
		btn = b.button(:name => 'jsearch')
		btn.exists?
		btn.click

		# page_html = Nokigiri::HTML.parse('b.html')
		# @links = page_html.css("a")
  end
end
