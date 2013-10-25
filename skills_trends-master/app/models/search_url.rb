require 'nokogiri'
require 'open-uri'

class SearchUrl < ActiveRecord::Base
  belongs_to :site
  attr_accessible :url, :site_id

    def self.crawl
    	searchUrl = SearchUrl.all
    	Skill.destroy_all
	    	searchUrl.each do |search|
	    	url = search.url
	        doc = Nokogiri::HTML(open(url))
	        if search.site_id == 1 || search.site_id == 3
	            site_scrape = doc.xpath(".//*[@id='searchResHD']/h2").inner_text.split.last
	            search_input = doc.xpath(".//*[@id='Keyword_1']/div/div").inner_text

	        elsif search.site_id == 2 || search.site_id == 4
	            site_scrape = doc.xpath(".//*[@id='toc_rows']/h4[1]").inner_text.split.at(5)
	            search_input = doc.at('input[@name="query"]')['value']
	        end
	        # if Skill.where(:site_id => search.site_id, :name => search_input).exists? == false
	        	Skill.create(:site_id => search.site_id, :name=> search_input, :count => site_scrape)
	      #   else
	   			# Skill.where(:site_id => search.site_id, :name => search_input ).update_all( :count => site_scrape)       
	   		# end
	    end
    end
end