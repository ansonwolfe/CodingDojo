class TestsController < ApplicationController
  def index
    require 'nokogiri'
      # require this so that we can grab contents of a url pretty easily
    require 'open-uri'

    url = "http://www.cnn.com"
      # use nokogiri to parse. create nokogiri document and actually say it's an html document. use open(url) to open up content of that url
    doc = Nokogiri::HTML(open(url))
    
    @tests_length = doc.css("a")
  end
end
