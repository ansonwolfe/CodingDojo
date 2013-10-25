require 'rubygems'
require 'nokogiri'
  # require this so that we can grab contents of a url pretty easily
require 'open-uri'

url = "http://www.apple.com"
  # use nokogiri to parse. create nokogiri document and actually say it's an html document. use open(url) to open up content of that url
doc = Nokogiri::HTML(open(url))
  # extract title of html document
puts doc.at_css("title").text
  # returns an array of items
doc.css(".item").each do |item|
	title = item.at_css(".prodLink").text
	price = item.at_css(".PriceCompare .BodyS, .PriceXLBold").text[/\$[0-9\.]+/]
	puts "#{title} - #{price}"
	puts item.at_css(".prodLink")[:href]
end